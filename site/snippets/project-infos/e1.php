<div class="text-credits row lead center">
	<div class="grid-item span-6 off-3">
		<?= $subtitle->kt() ?>
	</div>
</div>
<div class="row">
	<?php foreach ($primaryCredits as $key => $pcredit): ?>
		<div class="primary-credits">
			<?= $pcredit->kt() ?>
		</div>
	<?php endforeach ?>
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