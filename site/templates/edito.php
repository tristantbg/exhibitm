<?php snippet('header') ?>

<?php
$author = $page->parent()->title();

// Primary credits in Object
$primaryCredits = [];
if ($page->pcredits1()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits1());
}
if ($page->pcredits2()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits2());
}
if ($page->pcredits3()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits3());
}
if ($page->pcredits4()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits4());
}
$primaryCredits = structure($primaryCredits);
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

$medias = $page->medias()->toStructure();
$mediasCount = $medias->count();


?>

<div id="page-content" class="magnet">
	<div class="row section-magnet fp-auto-height">
		<div id="page-infos" class="row edito-infos">
			<div class="row center">
				<h1 class="title"><?= $author->html() ?></h1>
				<h2><?= $page->theme()->html().' Issue' ?></h2>
			</div>
			<div class="row pt-5 pb-10 center">
				<?php if($primaryCount == 0 && $textsCount == 1): ?>
					<?php if($page->text()->isNotEmpty()): ?>
					<div class="grid-item col-6 lead right" md="center pb-5"><?= $subtitle->kt() ?></div>
					<div class="grid-item col-6 small"><?= $page->text()->kt() ?></div>
					<?php else: ?>
						<div class="grid-item span-8 off-2 lead center"><?= $subtitle->kt() ?></div>
					<?php endif ?>
				<?php else: ?>
					<?php if ($textsCount == 2 && $subtitle->isNotEmpty()): ?>
						<div class="text-credits row lead center">
							<?= $subtitle->kt() ?>
						</div>
					<?php endif ?>
					<?php foreach ($primaryCredits as $key => $pcredit): ?>
						<?php
						$class = '';
						if($key == $primaryCount - 1) $class .= ' last';
						if ($key == 0 && $textsCount == 2) {
							if($primaryCount == 1) $class .= ' off-4_5';
							if($primaryCount == 2) $class .= ' off-3';
							if($primaryCount == 3) $class .= ' off-1_5';
						} else if ($key == 0){
							if($textsCount > 0 || $subtitle->isNotEmpty()) {
								if($primaryCount == 1) $class .= ' off-3';
							}
						}

						?>
						<div class="primary-credits<?= $class ?>">
							<?= $pcredit->kt() ?>
						</div>
					<?php endforeach ?>
					<?php if($primaryCount == 2): ?>
					<div class="grid-item col-6">
					<?php endif ?>
						<?php if ($textsCount < 2 && $subtitle->isNotEmpty()): ?>
							<div class="text-credits lead<?php e($textsCount > 2, ' right') ?>">
								<?= $subtitle->kt() ?>
							</div>
						<?php endif ?>
						<?php foreach ($texts as $key => $text): ?>
							<div class="text-credits small<?php e($key == $textsCount - 1, ' last') ?><?php e($subtitle->empty() && $textsCount < 2, ' off-6') ?><?php e($key == 0 && $textsCount == 2, ' cf') ?>">
								<?= $text->kt() ?>
							</div>
						<?php endforeach ?>
					<?php if($primaryCount == 2): ?>
					</div>
					<?php endif ?>
				<?php endif ?>
			</div>
		</div>
	</div>

	<?php foreach($medias as $key => $file): ?>

	<?php if($image = $file->toFile()): ?>

	<?php if($image->caption()->empty()): ?>
		<?php $caption = $page->title()->html().' — © '.$site->title()->html(); ?>
	<?php else: ?>
		<?php $caption = $page->title()->html().', '.$image->caption()->html().' — © '.$site->title()->html(); ?>
	<?php endif ?>

	<div class="edito image-content section-magnet fp-auto-height-responsive grid-item span-12 fit-h<?=	 ' '.$image->itemsize() ?>">

		<?php if($image->videolink()->isNotEmpty()): ?>
				<?= $image->videolink()->oembed([
				  'thumb' => thumb($image, array('width'=>1500))->url()
				]) ?>
		<?php else: ?>

			<?php 
			$srcset = '';
			for ($i = 500; $i <= 2500; $i += 1000) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
			?>

			<img 
			src="<?= resizeOnDemand($image, 100) ?>" 
			data-src="<?= resizeOnDemand($image, 1500) ?>" 
			data-srcset="<?= $srcset ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			class="lazyimg lazyload" 
			alt="<?= $caption ?>" 
			event-target="infos" 
			height="100%" width="auto">
			<noscript>
				<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $caption ?>" width="100%" height="auto" />
			</noscript>
			
			<?php if($image->imagecredits()->isNotEmpty()): ?>
				<div class="image-credits">
					<?= $image->imagecredits()->kt() ?>
				</div>
			<?php endif ?>
			<?php if($key == $mediasCount - 1 && $page->team()->isNotEmpty()): ?>
				<div class="image-credits">
					<?= $page->team()->kt() ?>
				</div>
			<?php endif ?>

		<?php endif ?>
	</div>
	
	<?php endif ?>
	<?php endforeach ?>

</div>

<div id="infos-overlay" class="edito-infos contained" event-target="infos">
		<?php foreach ($primaryCredits as $key => $pcredit): ?>
			<div class="primary-credits">
				<?= $pcredit->kt() ?>
			</div>
		<?php endforeach ?>
	</div>

<?php snippet('footer') ?>