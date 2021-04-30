<?php
require_once('../inc/faq.class.php');

$faq = new faq();

$faqDataArray = array();

// load the article if we have it
if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0) 
{
    $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->data;
}

//echo json_encode($faqDataArray);

$listOffaqs = json_encode($faqDataArray);

// var_dump($listOffaqs);
?>