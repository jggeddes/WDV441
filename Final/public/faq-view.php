<?php
require_once('../inc/faq.class.php');

$faq = new faq();

$faqDataArray = array();

//load the article if we have it
if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0) {
    $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->data;
}

// if (isset($_REQUEST['url_key']) && $_REQUEST['url_key'] > 0) {
//     $faq->loadKey($_REQUEST['url_key']);
//     $faqDataArray = $faq->data;
// }

// display the view
require_once('../tpl/faq-view.tpl.php');
?>