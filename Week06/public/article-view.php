<?php
// usage: http://localhost:8888/WDV441/Week05/public/article-view.php?articleID=1
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleDataArray = array();

$newsArticle->getArticles();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}
require_once('../tpl/article-view-tpl.php');
?>