<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<?php
			$class = '';
			if ($key == 0) $class .= ' off-4_5';
		?>
		<div class="primary-credits<?= $class ?>">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
</div>
<div class="row">
	<?php foreach ($texts as $key => $text): ?>
		<div class="text-credits left small grid-item span-6">
			<?= $text->kt() ?>
		</div>
	<?php endforeach ?>
</div>