<?php
session_start();
    include_once("../MySqlConnect.php");
    require_once 'registerfunction.php';

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $encryptpwd = md5($_POST['password']);
        $repassword = $_POST["repassword"];
        $fullname = $_POST["fistname"]." ".$_POST["lastname"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $phonenumber = $_POST["phonenumber"];
        $birthday = $_POST["birthday"];
        
        $birthdaycon2sql = con2mysql($birthday);

        $result = mysqli_query($mysqli, "select username from user
        where username='$username'");

        $user_matched = mysqli_num_rows($result);
        
        $flag = false;

        if ($user_matched > 0){
            exit('usernametaken');
            $flag = false;
        }
        else
            $flag = true;
        if(invalidUser($username) !== false){
            exit('invaliduser');
            $flag = false;
        }
        else
            $flag = true;
        if(rePasswd($password,$repassword) !== false){
            exit('passwordnotmatch');
            $flag = false;
        }
        else
            $flag = true;
        if(passwdLenght($password) !== false){
            exit('passwordlenght');
            $flag = false;
        }
        else
            $flag = true;
        if(repasswdLenght($repassword) !== false){
            exit('repasswordlenght');
            $flag = false;
        }
        else
            $flag = true;
        if(checkphoneNumber($phonenumber) !==false){
            exit('invalidphonenumber');
            $flag = false;
        }
        else
            $flag = true;
        if(birthdaycheck($birthday) !== false){
            exit('invalidday');
            $flag = false;
        }
        else
            $flag = true;
        if($flag){
            $resultinsert   = mysqli_query($mysqli, "INSERT INTO user(tenKH,username,password,Diachi,SDT,Gioitinh,NgaySinh) 
            VALUES('$fullname','$username','$encryptpwd','$address','$phonenumber','$gender','$birthdaycon2sql')");
            
            
            if ($resultinsert) {
                $_SESSION["user"] = $username;
                exit("allgood");
            } else {
                exit("notgood");
            }
        }
        
   }
?>