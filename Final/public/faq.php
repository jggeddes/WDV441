<?php
require_once('../inc/faq.class.php');
include_once('curl-test.php');
include_once('faq-widget.php');
require_once('faq-rest-list.php');

$faq = new faq();

$faqDataArray = array();

if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0) {
    $faq->load($_REQUEST['faqID']);
    $faqDataArray = $faq->data;
}

// display the view
require_once('../tpl/faq.tpl.php');
?>