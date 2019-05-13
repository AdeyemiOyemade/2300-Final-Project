<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");


if(isset($_POST['submit'])){
  $valid_submission = TRUE;
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO listserve (name, email) VALUES (:name, :email);";
  $params = array(':name' => $name,':email'=>$email);
  exec_sql_query($db, $sql, $params);

  if($name == ''){
    $valid_submission = FALSE;
    $name_error = TRUE;
  }

  if($email == ''){
    $valid_submission = FALSE;
    $email_error = TRUE;
  }
} else {
  $name = '';
  $email = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Get Involved";

  include('includes/head.php')
?>

<body>

<?php
  include('includes/header.php')

?>

  <!-- TODO: This should be your main page for your site. -->
  <main>
<?php
  if(isset($valid_submission) && $valid_submission){ ?>
  <div>
    <p> Thank you for joining our listserv!</p>
  </div>
<?php
  } else { ?>
  <div>
    <form id="join" method="post" action="getinvolved.php">
        <h1>Join Our Listserv!</h1>
        <p>If you want to join our mission, to make Cornell a more inclusive and welcoming community for <strong> all people, </strong> sign up below. </p>
        <p> We promise not to spam you. If you want to be reminded of general meeting times, or hear about our larger actions and events, submit your email to join our listserv.</p>
        <p>
            <label id="nameLabel" for="name_field">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"/>
            <label class="<?php if(!isset($name_error)){echo "hide"; } else {echo "display";} ?> ">Please provide your name. </label>
  </p>
  <p>
            <label id="emailLabel" for="email_field">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"/>
            <label class="<?php if(!isset($email_error)){echo "hide"; } else {echo "display";} ?> ">Please provide your email address. </label>
  </p>
        <input id="joinSubmit" type="submit" name="submit" value="Submit"/>
    </form>
  </div>
  <?php } ?>
  </main>
<?php

  include('includes/footer.php');

?>



</body>
</html>
