<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

// if user submits the login form

if (isset($_POST['submit_login'])) {
    $loginsucessful = false;
    $username = $_POST["username"];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $errorCode = log_in($username,$password);
}

// what happens if the user log's out
if (isset($_GET['submit_logout'])) {
    log_out();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
$pagetitle = "Login";

  include('includes/head.php')
?>


<body>

<?php
  include('includes/header.php')
?>
<main>
  <!-- if the user is signed in -->
<?php if (signed_in()) { ?>
        <h2> You are now logged in, <?php echo get_user()['user_name'] ?>!</h2>
        <h2> Please navigate to the <a href="admin.php">Admin page to get started. </a></h2>
        <!-- logout button -->
        <a id = "logoutButton" class = 'login-dec' href="<?php echo "?submit_logout" ?>">Logout</a>
        <?php } else{ ?>
        <h1>Sign In</h1>
            <!-- if the user is not signed in, display login in form -->
            <form id="loginForm" action="login.php" method="post">
            <?php
                if($errorCode > 0){ ?>
                    <div class="error"><?php echo($errorCodeArr[$errorCode]); ?></div>
                <?php }?>
                <!-- username input field -->
            <p>
              <label id="usernameLabel" for="username">Username:</label>
              <input id="username" type="text" name="username" value="<?php echo htmlspecialchars($username) ?>"/>
            </p>
                  <!-- password input field -->
            <p>
              <label id = "passwordLabel" for="password">Password:</label>
              <input id="password" type="password" name="password" />
            </p>
            <!-- sign in button -->
            <div class="submitbutton">
              <input id = "loginSubmit" class="submit_login" type="submit" name="submit_login" value="Sign In" />
                </div>
    </form>
    <?php } ?>

</main>
<?php
  include('includes/footer.php')
?>

</body>
</html>
