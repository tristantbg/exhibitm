<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<div class="primary-credits">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
	<div class="grid-item text-credits lead span-6">
		<?= $subtitle->kt() ?>
	</div>
</div>
<?php if($texts->count() > 0): ?>
<div class="row">
	<?php foreach ($texts as $key => $text): ?>
		<div class="text-credits left small grid-item span-6">
			<?= $text->kt() ?>
		</div>
	<?php endforeach ?>
</div>
<?php endif ?>