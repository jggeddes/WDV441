<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

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

$articleList = $newsArticle->getListFiltered(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($articleList);

require_once('../tpl/article-list-sort.tpl.php')
?>