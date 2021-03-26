<?php

session_start();

include_once('../inc/user.class.php');

$user = new user();

if(isset($_POST['Login'])){
    $user->userLogin($_POST['username'], $_POST['user_password']);
}

// if($_SESSION['user'] = $user_ID){
//     header('URL: user-view.php');
// }

require_once('../tpl/user-login.tpl.php')
?>