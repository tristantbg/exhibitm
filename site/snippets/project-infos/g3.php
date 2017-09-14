<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<div class="primary-credits">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
	<div class="grid-item span-6">
		<div class="grid-item text-credits lead">
			<?= $subtitle->kt() ?>
		</div>
		<?php foreach ($texts as $key => $text): ?>
			<div class="text-credits left small grid-item">
				<?= $text->kt() ?>
			</div>
		<?php endforeach ?>
	</div>
</div>