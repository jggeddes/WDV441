<?php
require_once('../inc/faq.class.php');

$faqLimit = (isset($_GET["limit"]) ? intval($_GET["limit"]) : 2);

$faq = new faq();

$faqList = $faq->getList();

$faqCount = 0;

// display the widget view
require_once('../tpl/faq-widget.tpl.php');
?>