<?php
// Start the session
session_start();
if (!isset($_SESSION['username']) || time() - $_SESSION['login_time'] > 60) {
    $_SESSION['msg'] = "You must log in first";
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('location: index.php');
}
else{
    // uncomment the next line to refresh the session, so it will expire after ten minutes of inactivity, and not 10 minutes after login
    $_SESSION['login_time'] = time();
    echo ( "this session is ". $_SESSION['username'] );
    //show rest of the page and all
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

