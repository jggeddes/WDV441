<?php

session_start();

// usage: http://localhost/Week05/public/article-view.php?articleID=1
require_once('../inc/user.class.php');

$user = new user();

$userDataArray = array();

//$user->getList();

// load the article if we have it
if (isset($_REQUEST['user_ID']) && $_REQUEST['user_ID'] > 0) {
    $user->load($_REQUEST['user_ID']);
    $userDataArray = $user->userData;
}

require_once('../tpl/user-view-tpl.php');
?>