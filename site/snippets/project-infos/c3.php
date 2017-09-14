<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<div class="primary-credits">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
	<?php foreach ($texts as $key => $text): ?>
		<div class="text-credits left small grid-item span-6">
			<?= $text->kt() ?>
		</div>
	<?php endforeach ?>
</div>