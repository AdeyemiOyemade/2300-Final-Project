<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<title>Profile</title>
<?php
$pagetitle = "Profile";

  include('includes/head.php');
?>
</head>

<body>

<?php
  include('includes/header.php')
?>

  <main>
      <div class="profile_page">
 <?php
//  get the id of the member selected in
    $id = $_GET['id'];
    if($id == NULL){?>
      <meta http-equiv="refresh" content="0; URL='team.php'" />
  <?php  }
  // sql to get that members information
    $sql = "SELECT * FROM people WHERE people.id = $id;";
      $params = array();
      $person = exec_sql_query($db, $sql, $params)->fetchAll();
      // display the member's image
      echo "<div class=''><img class='single_img' src='uploads/people/" . $person[0]['picture_name'] . "." . $person[0]['picture_ext'] . "' alt = 'test'></div>";



      // what happens when the form to edit the member is submitted

    if (isset($_POST['edit_member'])) {
      $edit_name = $_POST['edit_name'];
      $edit_name = filter_var($edit_name, FILTER_SANITIZE_STRING);

      $edit_year = $_POST['edit_year'];
      $edit_year = filter_var($edit_year, FILTER_VALIDATE_INT);


      $edit_major = $_POST['edit_major'];
      $edit_major = filter_var($edit_major, FILTER_SANITIZE_STRING);


      $edit_hometown = $_POST['edit_hometown'];
      $edit_hometown = filter_var($edit_hometown, FILTER_SANITIZE_STRING);


      $edit_bio = $_POST['edit_bio'];
      $edit_bio = filter_var($edit_bio, FILTER_SANITIZE_STRING);



      $valid_member_submission = TRUE;


      // If an admin removes a field, set them to their previous field
      if ($edit_name == '') {
        $edit_name = $person[0]['name'];
      }
      if ($edit_year == 0) {
        $edit_year = $person[0]['year'];
      }
      if ($edit_major == "") {
        $edit_major = $person[0]['year'];
      }
      if ($edit_hometown == "") {
        $edit_hometown = $person[0]['hometown'];
      }
      if ($edit_bio == "") {
        $edit_bio = $person[0]['bio'];
      }

      // sql to update the user's information

      $sql_update = "UPDATE people SET name = :edit_name, year =:edit_year, major=:edit_major, hometown =:edit_hometown, bio = :edit_bio WHERE people.id =:id;";


      $params_update = array(
        ":edit_name" =>  $edit_name,
        ':edit_year' => $edit_year,
        ":edit_major" => $edit_major,
        ":edit_hometown" => $edit_hometown,
        ':edit_bio' => $edit_bio,
        ":id" => $id
      );
      $update_person = exec_sql_query($db, $sql_update, $params_update)->fetchAll();

      // sql to re-display that person in people's table
      $sql = "SELECT * FROM people WHERE people.id = $id;";
      $params = array();
      $person = exec_sql_query($db, $sql, $params)->fetchAll();



    }


?>
<div class=''>




    <?php
      // if the "click to add to profile" button is clicked

      if (isset($_POST['add_to_prof'])) {

        ?>

        <!-- display the form to edit the profile -->

      <form id="editprof" method="post" action=<?php echo 'profile.php?id='.$id?> enctype="multipart/form-data">
        <!-- name input -->
        <p>
        <div class="<?php if ($name_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Edit the member's name. </div>
              <label for="edit_name">Name:</label>
              <input type="text" name="edit_name" value="<?php echo $person[0]['name']; ?>" />
            </p>
            <!-- year input -->
            <p>
            <div class="<?php if ($year_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Edit the member's graduation year. </div>
              <label for="edit_year">Year:</label>

              <select id='edit_year' name='edit_year'>
                <option value='<?php echo htmlspecialchars($year)?>' selected><?php echo $person[0]['year']  ?></option>
                <?php
                $years = ['2019', '2020', '2021', '2022'];
                foreach ($years as $year) { ?>

                  <option value="<?php echo $year ?>"><?php echo $year ?> </option>

                <?php
              }

              ?>
              </select>
            </p>
            <!-- major input -->
            <p>
            <div class="<?php if ($major_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Edit the member's major. </div>
              <label for="edit_major">Major:</label>
              <input type="text" name="edit_major" value="<?php if ($person[0]['major'] != '') { echo $person[0]['major'];} else { echo '';} ?>" />
            </p>
            <!-- hometown input -->
            <p>
            <div class="<?php if ($hometown_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Edit the member's hometown. </div>
              <label for="edit_hometown">Hometown:</label>
              <input type="text" name="edit_hometown" value="<?php if ($person[0]['hometown'] != '') { echo $person[0]['hometown'];} else { echo '';} ?>" />
            </p>
            <!-- bio input -->
            <p>
            <div class="<?php if ($bio_error) {
                          echo "error";
                        } else {
                          echo "hide";
                        } ?> ">Edit member's bio. </div>
              <label for="edit_bio">Bio:</label>
              <textarea id ="edit_bio" name="edit_bio"><?php if ($person[0]['bio'] != '') { echo $person[0]['bio'];} ?> </textarea>
            </p>
            <!-- submit button -->
            <button type="submit" name="edit_member">done</button>
            </p>
        </form>

    <?php

    } else {
      // else if the buttion is not clicked display
      echo '<h2>' .htmlspecialchars($person[0]['name']). "</h2>";
      echo "<p> Hometown: " .htmlspecialchars($person[0]['hometown']) . "</p>";
      echo "<p> Year: " . htmlspecialchars($person[0]['year']) . "</p>";
      echo "<p> Major: " . htmlspecialchars($person[0]['major']) . "</p>";
      echo "<p>" . htmlspecialchars($person[0]['bio']) . "</p>";
      // if the admin is signed in
    if (signed_in()) {?>
    <!-- display the "click to edit this profile" button -->
      <form id="addtoprof" method="post" action=<?php echo 'profile.php?id='.$id?> enctype="multipart/form-data">
        <button type= 'submit' name= "add_to_prof">Click To Edit This Profile</button>

      </form>
      <?php
    }
  }
    ?>


</div>




</div>
<a href = "team.php" class = 'login-dec'>Go Back</a>

  </main>
<?php

  include('includes/footer.php');

?>



</body>
</html>
