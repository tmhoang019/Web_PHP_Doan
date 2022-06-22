<?php
    function invalidUser($username){
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || (strlen($username) > 20) || (strlen($username) < 3) ){
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function rePasswd($password,$repassword){
        $result = true;
        if($password !== $repassword)
            $result = true;
        else
            $result = false;    
        return $result;
    }
    function passwdLenght($password)
    {
        $result = false;
        if ((strlen($password) > 30) || (strlen($password) < 3) ){
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function repasswdLenght($repassword)
    {
        $result = false;
        if ((strlen($repassword) > 30) || (strlen($repassword) < 3) ){
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function checkphoneNumber($phonenumber){
        $result = false;
        if (!preg_match("/^0[0-9]{9}$/",$phonenumber)){
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function birthdaycheck($birthday)
    {
        $result = false;
        $birthday = explode('/', $birthday);
        $day = @$birthday[0];
        $month = @$birthday[1];
        $year  = @$birthday[2];
        $currentyear = date("Y");
        if(!checkdate(intval($month),intval($day),intval($year)))
            $result = true;
        if($year > $currentyear)
        {
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function con2mysql($date) {

        $date = explode("/",$date);
        if (@$date[0]<=9) { @$date[0]="0".@$date[0]; }
        if (@$date[1]<=9) { @$date[1]="0".@$date[1]; }
        $date = array(@$date[2], @$date[1], @$date[0]);
       
       return $n_date=implode("-", $date);
    }
?>