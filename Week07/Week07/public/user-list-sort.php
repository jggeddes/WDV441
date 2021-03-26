<?php

session_start();

require_once('../inc/user.class.php');

$user = new user();

/*
// testing the search
$articleList = $newsArticle->getList(
    "articleID",
    "DESC",
    "articleTitle",
    "Article"
);
var_dump($articleList);die;
*/

$userList = $user->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($articleList);

require_once('../tpl/user-list-sort.tpl.php')
?>