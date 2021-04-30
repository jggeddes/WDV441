<html>
    <body>
        Question: <?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faq_question'] : ''); ?><br>
        Answer: <?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?>
		<br>
        <a href="../public/faq-list.php">Back to List</a>        
    </body>
</html>