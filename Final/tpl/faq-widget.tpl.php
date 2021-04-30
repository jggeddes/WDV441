<div class="proprietary-faq-widget-div">
	<ul class="proprietary-faq-widget-ul">
    <?php foreach ($faqList as $faqInfo) { ?>
			<?php if($faqCount++ >= $faqLimit) break; ?>
			<h1 class="proprietary-faq-widget-ul">Question: <?= $faqInfo["faqQuestion"]; ?></h1>
			<li class="proprietary-faq-widget-ul">Answer: <?= $faqInfo["faqAnswer"]; ?></li>
		<?php } ?>
	</ul>
</div>