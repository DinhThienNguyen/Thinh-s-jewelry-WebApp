<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'user', '', 'jewelry');

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        echo "Failed";
    }
    if (empty($password)) {
        echo "Failed";
    }
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password){
        session_start();
        $_SESSION['username'] = $username;        
        $_SESSION['login_time'] = time();          
        header('location: admin.php');
    }
    else{
        echo "login failed";
    }
  }
?>