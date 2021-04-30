<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">

                <?php if (isset($faqErrorsArray['faqQuestion']))                 
                { ?>
                    <div><?php echo $faqErrorsArray['faqQuestion']; ?>
                <?php } ?>
            faq question: <textarea name="faqQuestion"><?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faqQuestion'] : ''); ?></textarea><br>

                <?php if (isset($faqErrorsArray['faqAnswer']))                 
                { ?>
                    <div><?php echo $faqErrorsArray['faqDate']; ?>
                <?php } ?>
            faq Answer: <textarea name="faqAnswer"><?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?></textarea><br>
            
            <input type="hidden" name="faqID" value="<?php echo (isset($faqDataArray['faqID']) ? $faqDataArray['faqID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Reset"/>            
        </form>        
    </body>
</html>