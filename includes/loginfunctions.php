<?php

$errorCodeArr = array(
    0 => "No Error",
    1 => "User does not exist",
    2 => "Invalid Username or Password",
    3 => "You are already signed in",
    4 => "Log in error");

function signed_in(){
    global $db;
    $sql = "SELECT * FROM sessions;";
    $sessions = exec_sql_query($db, $sql) ->fetchAll();
    return (sizeof($sessions)>0);
}

function get_user(){
    global $db;

    if(signed_in()){
        $sql = "SELECT users.user_name, users.id FROM users INNER JOIN sessions ON users.id = sessions.user_id;";
        $sessions = exec_sql_query($db, $sql) ->fetchAll();
        return $sessions[0];
    }
}

//attempts to log in with given username and hashed password, returns error code
function log_in($username,$password){
    global $db;
    $errorCode = 0;
    /* Source: lab 8 */
    //find username in database
    $sql = "SELECT * FROM users WHERE user_name = :username;";
    $params = array(
      ':username' => $username
    );
    $unamearray = exec_sql_query($db, $sql, $params)->fetchAll();
    if (sizeof($unamearray)>0) {//checking not empty array
      $loginInfo = $unamearray[0];//usernames unique

      // php function compares hashed passwood
      if (password_verify($password, $loginInfo['password']) ) {
        //check to see if already signed in
        $sql = "SELECT * FROM sessions;";
        $sessions = exec_sql_query($db, $sql) ->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($sessions)==0 ){
            //php function to create session
            $session = session_create_id();

            // add this session to session database
            $sql = "INSERT INTO sessions (user_id, session) VALUES (:user_id, :session);";
            $params = array(
            ':user_id' => $loginInfo['id'],
            ':session' => $session
            );
            $newsession = exec_sql_query($db, $sql, $params) ->fetchAll(PDO::FETCH_ASSOC);
            if (sizeof($newsession) > 0) {
                // sets cookie for user, sends it to browser
                setcookie("session", $session, time() + SESSION_COOKIE_DURATION);
            }
        }
        else{
            $errorCode = 3;
        }
      }
      else{
          $errorCode =2;
      }
    }
    else{
        $errorCode = 1;
    }
    return $errorCode;
}

//logs user out
function log_out(){
    global $db;
    if(signed_in()){
        //delete cookie
        setcookie('session', '', time() - SESSION_COOKIE_DURATION);
        $sql = "DELETE FROM sessions;";
        $sessions = exec_sql_query($db, $sql) ->fetchAll();
    }
}
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    $username = trim($_POST['username']); //getting the username form the form
    $password = trim($_POST['password']); //get the password form the form
    log_in($username, $password); //pass them into the function
}


if ( isset($_GET['submit_logout']) || isset($_POST['submit_logout']) )  {
    // logging out.
    log_out();
}



?>
