<?php snippet('header') ?>

<?php 
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
$medias = $page->medias()->toStructure();
$mediasCount = $medias->count();
?>

<div id="page-content" class="magnet">
	<div class="row section-magnet contained fp-auto-height">
		<div id="page-infos" class="row edito-infos">
			<?php snippet('project-infos', array('page' => $page, 'primaryCredits' => $primaryCredits)) ?>
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
			for ($i = 500; $i <= 2500; $i += 500) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
			?>

			<img 
			src="<?= $image->width(100)->url() ?>" 
			data-src="<?= $image->width(1500)->url() ?>" 
			data-srcset="<?= $srcset ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			class="lazyimg lazyload" 
			alt="<?= $caption ?>" 
			event-target="infos" 
			height="100%" width="auto">
			<noscript>
				<img src="<?= $image->width(1500)->url() ?>" alt="<?= $caption ?>" width="100%" height="auto" />
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

<div id="scroll-to-top" event-target="scroll-to-top">
	<div class="row center"><span></span></div>
</div>

<?php snippet('footer') ?>