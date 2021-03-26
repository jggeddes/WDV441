<?php

session_start();

// usage: http://localhost/Week05/public/user-edit.php?userID=1
// usage new: http://localhost/Week05/public/user-edit.php
require_once('../inc/user.class.php');

// create an instance of our class so we can use it
$user = new user();

// initialize some variables to be used by our view
$userDataArray = array();
$userErrorsArray = array();
$user->getList();

// load the user if we have it
if (isset($_REQUEST['user_ID']) && $_REQUEST['user_ID'] > 0) {
    $user->load($_REQUEST['user_ID']);
    // set our user array to our local variable
    $userDataArray = $user->userData;
}

if(isset($_POST['Cancel'])){
    header('Location: user-list.php');
    exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $userDataArray = $user->sanitize($_POST);
    // pass the array into our instance
    $user->set($userDataArray);
    
    // validate
    if ($user->validate()) {
        // save
        if ($user->save()) {
            $user->saveImage($_FILES['upload_image']);
            header("location: user-save-success.php");
            exit;
        } else {
            $userErrorsArray[] = "Save failed";
        }
    } else {
        $userErrorsArray = $user->errors;
        $userDataArray = $user->data;
    }
}

require_once('../tpl/user-edit.tpl.php')

?>