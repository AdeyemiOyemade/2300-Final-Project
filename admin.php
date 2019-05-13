<?php
// INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

// cosntant max file size
const MAX_FILE_SIZE = 1000000;
$name_error= FALSE;
$year_error= FALSE;
$pic_error= FALSE;
$title_error = FALSE;
$startdate_error = FALSE;
$starttime_error = FALSE;

// if the admin logs out
if (isset($_GET['submit_logout'])) {
  log_out();
}

// what happens when an admin adds an event
if (isset($_POST['add_event'])) {
  $title_error = FALSE;
  $startdate_error = FALSE;
  $starttime_error = FALSE;
  $eventpic_error = FALSE;
  $valid_event_submission = TRUE;
  $title = $_POST['title'];
  $title = filter_var($title, FILTER_SANITIZE_STRING);

  $startdate = $_POST['startdate'];
  $startdate = preg_replace("([^0-9-])","",$startdate);

  $enddate = $_POST['enddate'];
  $enddate = preg_replace("([^0-9-])","",$enddate);

  $starttime = $_POST['starttime'];
  $starttime = preg_replace("([^0-9:])","",$starttime);

  $endtime = $_POST['endtime'];
  $endtime = preg_replace("([^0-9:])","",$endtime);


  $location = $_POST['location'];
  $location = filter_var($location, FILTER_SANITIZE_STRING);

  $photo = $_FILES['photo'];

  if ($photo["error"] === UPLOAD_ERR_OK) {
    $photo_name = basename($photo['name']);

    $photo_filename =  strtolower(pathinfo($photo_name, PATHINFO_FILENAME));

    $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
  }else{
    $eventpic_error = TRUE;
    $valid_event_submission = FALSE;

  }

  $events = "name, startdate, starttime, photo_name, photo_ext";
  $values = ":title, :startdate, :starttime, :photo_name, :photo_ext";
  $params = array(':title' => $title, ':startdate' => $startdate, ':starttime' => $starttime, ':photo_name' => $photo_filename, ':photo_ext' => $photo_ext);

  if ($title == '') {
    $valid_event_submission = FALSE;
    $title_error = TRUE;
  }
  if ($startdate == '') {
    $valid_event_submission = FALSE;
    $startdate_error = TRUE;
  }

  if ($starttime == '') {
    $valid_event_submission = FALSE;
    $starttime_error = TRUE;
  }

  if($enddate != NULL){
    $events .= ", enddate";
    $values .= ", :enddate";
    $params[':enddate'] = $enddate;
  }

  if($endtime != NULL){
    $events .= ", endtime";
    $values .= ", :endtime";
    $params[':endtime'] = $endtime;
  }

  if($location != NULL){
    $events .= ", location";
    $values .= ", :location";
    $params[':location'] = $location;
  }

  if ($valid_event_submission) {
    $sql = "INSERT INTO events (". $events .") VALUES (" . $values . ");";
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      // creating a path for the image of the event
      $path = "uploads/events/" . $photo_filename . '.' . $photo_ext;
      move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
    }
    $title ="";
    $startdate ="";
    $enddate ="";
    $starttime ="";
    $endtime ="";
    $location="";
  } else {
    echo "fail to add event";
  }
} else {
  $title = '';
  $startdate = '';
}

// what happens when you add a new member

if (isset($_POST['add_member'])) {
  $valid_member_submission = TRUE;
  $name_error= FALSE;
  $year_error= FALSE;
  $major_error= FALSE;
  $hometown_error= FALSE;
  $bio_error= FALSE;
  $pic_error= FALSE;

  $name = $_POST['member_name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);

  $year = $_POST['member_year'];
  $year = filter_var($year, FILTER_SANITIZE_STRING);

  $major = $_POST['major'];
  $major = filter_var($major, FILTER_SANITIZE_STRING);

  $hometown = $_POST['hometown'];
  $hometown = filter_var($hometown, FILTER_SANITIZE_STRING);

  $bio = $_POST['bio'];
  $bio = filter_var($bio, FILTER_SANITIZE_STRING);

  $headshot = $_FILES['headshot'];
  if ($headshot["error"] === UPLOAD_ERR_OK) {
    $headshot_name = basename($headshot['name']);
    $headshot_filename = strtolower(pathinfo($headshot_name, PATHINFO_FILENAME));
    $headshot_ext = strtolower(pathinfo($headshot_name, PATHINFO_EXTENSION));
  }

  if ($name == NULL) {
    $valid_member_submission = FALSE;
    $name_error = TRUE;
  }

  if ($year == 0) {
    $valid_member_submission = FALSE;
    $year_error = TRUE;
  }

  if ($major == NULL) {
    $valid_member_submission = FALSE;
    $major_error = TRUE;
  }

  if ($hometown == NULL) {
    $valid_member_submission = FALSE;
    $hometown_error = TRUE;
  }

  if ($bio == NULL) {
    $valid_member_submission = FALSE;
    $bio_error = TRUE;
  }

  if ($headshot == NULL) {
    $valid_member_submission = FALSE;
    $pic_error = TRUE;
  }

  if ($valid_member_submission) {
    // sql to add a new member
    $sql = "INSERT INTO people (name, year, major, hometown, bio, picture_name, picture_ext) VALUES (:name, :year, :major, :hometown, :bio, :headshot_name, :headshot_ext);";
    $params = array(
    ':name' => $name,
    ':year' => $year,
    ':major' => $major,
    ':hometown' => $hometown,
    'bio' => $bio,
    ':headshot_name' => $headshot_filename,
    ':headshot_ext' => $headshot_ext
  );
    $result = exec_sql_query($db, $sql, $params);
    if (sizeof($result)!=0) {
      $path = "uploads/people/" . $headshot_filename . "." .$headshot_ext;
      move_uploaded_file($_FILES["headshot"]["tmp_name"], $path);
    }


  $name = "";
  $year = "";
  $major = '';
  $hometown = "";
  $bio = "";

  }
}

// what happens when you delete an event

if (isset($_POST['delete_events'])) {
  // find the event in the events table
  $sel_sql = 'SELECT * FROM events WHERE events.id = :user_input;';
  $sel_params = array(":user_input"=> $_POST['delete_this_events']);

  $unlinking = exec_sql_query($db, $sel_sql, $sel_params)->fetchAll();
  $pic_name = $unlinking[0]['photo_name'];

  $pic_ext = $unlinking[0]['photo_ext'];
  // unlink the picture associated with it
  unlink("uploads/events/$pic_name.$pic_ext");
  // delete it from the database
  $sql = 'DELETE FROM events WHERE events.id = :user_input';
  $params = array(
    ':user_input' => $_POST['delete_this_events']
  );
  $delete = exec_sql_query($db, $sql, $params)->fetchAll();
  if ($delete) {
    $message = 'You have sucessfully deleted this event!';
  }
}

// what happens when you delete a member
if (isset($_POST['delete_members'])) {
  // finding that member in the members table
  $sel_sql = 'SELECT * FROM people WHERE people.id = :user_input;';
  $sel_params = array(":user_input"=> $_POST['delete_this_member']);

  // unlinking the person's picture
  $unlinking = exec_sql_query($db, $sel_sql, $sel_params)->fetchAll();
  $pic_name = $unlinking[0]['picture_name'];

  $pic_ext = $unlinking[0]['picture_ext'];

  unlink("uploads/people/$pic_name.$pic_ext");

  // delete the person from the database
  $sql = 'DELETE FROM people WHERE people.id = :user_input';
  $params = array(
    ':user_input' => $_POST['delete_this_member']
  );
  $delete = exec_sql_query($db, $sql, $params)->fetchAll();



}
?>

<!DOCTYPE html>
  <html lang="en">

<?php

$pagetitle = "Admin";
include('includes/head.php');
?>
<body>

  <?php
  include('includes/header.php')
  ?>

  <main>
    <!-- if user is logged in display the add and delete forms -->
    <?php if (signed_in()) { ?>

      <h1>Administrator Control Panel</h1>

      <!-- log out function -->

      <form id="logout" method="get" action="index.php">
        <button type="submit" name="submit_logout">Log Out</button>
      </form>

      <div class="formgrid">
        <!-- deleting an event form -->
        <form id="deletevent" method="post" action="admin.php">
          <fieldset>

            <legend>Delete Event</legend>

            <?php

            if (isset($_POST['delete_events'])) { ?>
              <p class="adminFeedbackMessage"> Event successfully deleted. </p>
            <?php
            }
            // get all the events' name
            $drop_down_sql = exec_sql_query($db, "SELECT * FROM events;")->fetchAll();

            ?>
            <!-- put all the events as a dropdown option for deletion -->
            <select id='delete_this_events' name='delete_this_events'>
              <option value='' disabled selected>Select Event</option>
              <?php
              foreach ($drop_down_sql as $event) { ?>

                <option value="<?php echo htmlspecialchars($event['id']) ?>"><?php echo htmlspecialchars($event['name']) ?></option>

              <?php
            }

            ?>
            </select>
            <!-- delete button -->
            <button type="submit" name="delete_events">delete</button>

          </fieldset>
        </form>

        <!-- deleteing a member from the teams page -->

        <form id="deleteteam" method="post" action="admin.php">
          <fieldset>
            <legend>Delete Team Member</legend>
            <?php


            if (isset($_POST['delete_members'])) { ?>
              <p class="adminFeedbackMessage"> Member successfully deleted. </p>
            <?php
            }
            // getting all the team members from the database
            $drop_down_sql = exec_sql_query($db, "SELECT * FROM people;")->fetchAll();

            ?>
            <!-- making them an option for deletion  -->
            <select id='delete_this_member' name='delete_this_member'>
              <option value='' disabled selected>Select Member</option>
              <?php
              foreach ($drop_down_sql as $member) { ?>

                <option value="<?php echo htmlspecialchars($member['id']) ?>"><?php echo htmlspecialchars($member['name']) ?></option>

              <?php
            }

            ?>
            </select>
            <!-- delete member's button -->
            <button type="submit" name="delete_members">delete</button>
          </fieldset>
          </form>
          </div>
<div class="formgrid">
        <!-- Adding an event's form -->
        <form id="addevent" method="post" action="admin.php" enctype="multipart/form-data">
          <fieldset>
            <legend>Add Event</legend>

            <?php
            if($valid_event_submission) { ?>
              <p class = "adminFeedbackMessage"> Event successfully added! </p>
            <?php
            }
            ?>

            <div class="forminput">
              <!-- Title input -->
            <div class="<?php if ($title_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide an event title. </div>
              <label for="eventtitle">Title:<span class="imp">*</span></label>
              <input type="text" name="title" id="eventtitle" value="<?php echo htmlspecialchars($title); ?>" />
            </div>
            <div class="forminput">
              <!-- start date input -->
            <div class="<?php if ($startdate_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide an event start date.  </div>
              <label for="startdate">Start Date:<span class="imp">*</span></label>
              <input type="date" name="startdate" id="startdate" value="<?php echo htmlspecialchars($startdate); ?>" />
              </div>
            <!-- end date input -->
            <div class="forminput">
              <label for="enddate">End Date:</label>
              <input type="date" name="enddate" id="enddate" value="<?php echo htmlspecialchars($enddate); ?>" />
                      </div>

            <!-- start time input -->
            <div class="forminput">
            <div class="<?php if ($starttime_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide an event start time in the form hr:min:AM/PM. </div>
              <label for="starttime">Start Time:<span class="imp">*</span></label>
              <input type="time" name="starttime" id="starttime" value="<?php echo htmlspecialchars($starttime); ?>" />
                      </div>
            <!-- end time input -->
            <div class="forminput">
              <label for="endtime">End Time:</label>
              <input type="time" name="endtime" id="endtime" value="<?php echo htmlspecialchars($endtime); ?>" />
                      </div>
            <!-- location input -->
            <div class="forminput">
              <label for="location">Location:</label>
              <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($location); ?>" />
                      </div>

            <!-- event image input -->
            <div class="forminput">
            <div class="<?php if ($eventpic_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide a picture of type jpg, png, or gif smaller than 10000kb.</div>
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />

              <label for="photo">Photo:<span class="imp">*</span></label>
              <input type="file" name="photo" id="photo" />
                      </div>
            <!-- submit button -->
            <button type="submit" name="add_event">Add</button>
          </fieldset>
        </form>
        <!-- adding a new team form -->
        <form id="addteam" method="post" action="admin.php" enctype="multipart/form-data">
          <fieldset>
            <legend>Add Team Member</legend>
            <?php
            if($valid_member_submission) { ?>
              <p class = "adminFeedbackMessage"> Member successfully added! </p>
            <?php
            }
            ?>
            <!-- Name input -->
            <div class="forminput">
            <div class="<?php if ($name_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide the member's name. </div>
              <label for="member_name">Name:<span class="imp">*</span></label>
              <input type="text" name="member_name" id="member_name" value="<?php echo htmlspecialchars($name); ?>" />
                      </div>
            <!-- Year input -->
            <div class="forminput">
            <div class="<?php if ($year_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide the member's graduation year. </div>
              <label for="member_year">Year:<span class="imp">*</span></label>

              <select id='member_year' name='member_year'>
                <option value='' disabled selected>year</option>
                <?php
                $years = ['2019', '2020', '2021', '2022'];
                foreach ($years as $possibleyear) { ?>
                  <option value="<?php echo $possibleyear ?>" <?php if($year ==$possibleyear){echo 'selected="selected"';}?>><?php echo $possibleyear ?> </option>

                <?php
              }

              ?>
              </select>
                        </div>

              <!-- major input -->
              <div class="forminput">
            <div class="<?php if ($major_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide the member's major. </div>
              <label for="major">Major:<span class="imp">*</span></label>
              <input type="text" name="major" id="major" value="<?php echo htmlspecialchars($major); ?>" />
                      </div>
            <!-- hometown input -->
            <div class="forminput">
            <div class="<?php if ($hometown_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide the member's hometown. </div>
              <label for="hometown">Hometown:<span class="imp">*</span></label>
              <input type="text" name="hometown" id="hometown" value="<?php echo htmlspecialchars($hometown); ?>" />
                      </div>
            <!-- headshot of the member -->
            <div class="forminput">
            <div class="<?php if ($pic_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide a picture headshot of type jpg, png, gif, of less than 10000kb.</div>
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />

              <label for="headshot">Headshot:<span class="imp">*</span></label>
              <input type="file" name="headshot" id="headshot" />
                      </div>
            <!-- bio of the member -->
            <div class="forminput">
            <div class="<?php if ($bio_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Please provide the member's bio. </div>
              <label for="bio">Bio:<span class="imp">*</span></label>
              <textarea name="bio" id="bio"><?php echo htmlspecialchars($bio); ?></textarea>
                      </div>
            <!-- submit button -->
            <button type="submit" name="add_member">Add</button>
          </fieldset>
        </form>

      </div>

    <?php } else { ?>
      <meta http-equiv="refresh" content="0; URL='login.php'" />
    <?php } ?>
  </main>
  <?php
  include('includes/footer.php')
  ?>

</body>

</html>
