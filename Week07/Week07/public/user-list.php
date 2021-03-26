<?php

session_start();

require_once('../inc/user.class.php');

$user = new user();

$userList = $user->getList();

require_once('../tpl/user-list.tpl.php')

?>