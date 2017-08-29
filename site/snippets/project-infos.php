<?php
$author = $page->parent()->title();
$primaryCount = count($primaryCredits);

// Subtitle
$subtitle = $page->subtitle();

// Text credits in Object
$texts = [];
if ($page->text()->isNotEmpty()) {
	array_push($texts, $page->text());
}
if ($page->additionaltext()->isNotEmpty()) {
	array_push($texts, $page->additionaltext());
}
$texts = structure($texts);
$textsCount = count($texts);
?>

<div class="row center">
	<h1 class="title"><?= $author->html() ?></h1>
	<h2><?= $page->theme()->html().' Issue' ?></h2>
</div>
<div class="row pt-5 pb-10">
	<?php if($primaryCount == 0 && $textsCount == 1): ?>
		<?php if($page->text()->isNotEmpty()): ?>
		<div class="grid-item col-6 lead right" md="center pb-5"><?= $subtitle->kt() ?></div>
		<div class="grid-item col-6 small left"><?= $page->text()->kt() ?></div>
		<?php else: ?>
			<div class="grid-item span-8 off-2 lead center"><?= $subtitle->kt() ?></div>
		<?php endif ?>
	<?php else: ?>
		<?php if ($subtitle->isNotEmpty() && $textsCount == 2 or $primaryCount > 2): ?>
			<div class="text-credits row lead center">
				<?= $subtitle->kt() ?>
			</div>
		<?php endif ?>
		<?php foreach ($primaryCredits as $key => $pcredit): ?>
			<?php
			$class = '';
			if($key == $primaryCount - 1) $class .= ' last';
			if ($key == 0) {
				if ($textsCount == 2) {
					if($primaryCount == 1) $class .= ' off-4_5';
					if($primaryCount == 2) $class .= ' off-3';
					if($primaryCount == 3) $class .= ' off-1_5';
				} else if($textsCount == 1 && $primaryCount > 2) {
					if($primaryCount == 1) $class .= ' off-4_5';
					if($primaryCount == 2) $class .= ' off-3';
					if($primaryCount == 3) $class .= ' off-1_5';
				} else if($primaryCount == 1 && $textsCount == 1) {
					$class .= ' last grid-item off-3';
				}
			}

			?>
			<div class="primary-credits<?= $class ?>">
				<?= $pcredit->kt() ?>
			</div>
		<?php endforeach ?>
		<?php if($primaryCount < 2 && $textsCount < 2): ?>
		<div class="grid-item col-6">
		<?php endif ?>
			<?php if ($subtitle->isNotEmpty() && $primaryCount < 3 && $textsCount < 2): ?>
				<div class="text-credits lead<?php e($textsCount > 2, ' right', ' left') ?>">
					<?= $subtitle->kt() ?>
				</div>
			<?php endif ?>
			<?php foreach ($texts as $key => $text): ?>
				<div class="text-credits left small grid-item<?php e($textsCount == 2, ' span-6') ?><?php e($key == $textsCount - 1, ' last') ?><?php e($subtitle->empty() && $textsCount < 2 && $primaryCount > 2, ' off-6') ?><?php e($key == 0 && $textsCount == 2 or $primaryCount > 2, ' cf') ?>">
					<?= $text->kt() ?>
				</div>
			<?php endforeach ?>
		<?php if($primaryCount < 2 && $textsCount < 2): ?>
		</div>
		<?php endif ?>
	<?php endif ?>
</div>