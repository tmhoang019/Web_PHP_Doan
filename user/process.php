<?php
session_start();

// Create database connection using config file
include_once("../MySqlConnect.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $user    = $_POST['username'];
    $password = $_POST['password'];
    $encryptpwd = md5($_POST['password']);

    // Check if a user exists with given username & password
    $result = mysqli_query($mysqli, "select username,password from user
        where username='$user' and password='$encryptpwd' and trangthai=0 ");
    //nv
    $result1 = mysqli_query($mysqli, "select username,password from user_nv
        where username='$user' and password='$password' and trangthai=0 ");
    // Count the number of user/rows returned by query 
    $user_matched = mysqli_num_rows($result);

    $user_matched1 = mysqli_num_rows($result1);

    // Check If user matched/exist
    if ($user_matched > 0) {
        $_SESSION["user"] = $user;
        exit('0');
    } else {
        if($user_matched1 > 0){
            $_SESSION['user_nv'] = $user;
            exit('0');
        }
        else exit('1');
        exit('1');
    }
}
?>