<?php
function checkPrivilege($uri = false) {
    
    $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
    if(empty($_SESSION['current_user']['privileges'])){
        return false;
    }
    $privileges = $_SESSION['current_user']['privileges'];
    $privileges = implode("|", $privileges);
    
    preg_match('/admin\.php$|' . $privileges . '/', $uri, $matches);
    return !empty($matches);
}
function checkUsername($regex){
    preg_match('/^[a-zA-Z]+$/', $regex, $matche1);
    return !empty($matche1);
}
function checkPhone($regex2){
    preg_match('/^0[0-9]{9}$/', $regex2, $matche2);
    return !empty($matche2);
}
?>