<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<?php
			$class = '';
			if ($key == 0) $class .= ' off-3';
		?>
		<div class="primary-credits<?= $class ?>">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
</div>