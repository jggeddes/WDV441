<?php
require_once('../inc/faq.class.php');

$faq = new faq();

$faqList = $faq->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($articleList);

//echo json_encode($faqList);

$listOffaqs = json_encode($faqList);

//var_dump($listOffaqs);
?>