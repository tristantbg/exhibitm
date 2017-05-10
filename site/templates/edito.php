<?php snippet('header') ?>

<?php $author = $page->parent()->title() ?>

<div id="page-content" class="magnet">
	<div class="row section-magnet fp-auto-height">
		<div id="page-infos" class="row">
			<div class="row center">
				<h1 class="title"><?= $author->html() ?></h1>
				<h2><?= $page->theme()->html().' Issue' ?></h2>
			</div>
			<div class="row pt-3 pb-10">
				<?php if($page->text()->isNotEmpty()): ?>
					<div class="grid-item col-6 lead right"><?= $page->credits()->kt() ?></div>
					<div class="grid-item col-6 small"><?= $page->text()->kt() ?></div>
				<?php else: ?>
					<div class="grid-item span-8 off-2 lead center"><?= $page->credits()->kt() ?></div>
				<?php endif ?>
			</div>
		</div>
	</div>

	<?php foreach($page->medias()->toStructure() as $file): ?>

	<?php if($image = $file->toFile()): ?>

	<?php if($image->caption()->empty()): ?>
		<?php $caption = $page->title()->html().' — © '.$site->title()->html(); ?>
	<?php else: ?>
		<?php $caption = $page->title()->html().', '.$image->caption()->html().' — © '.$site->title()->html(); ?>
	<?php endif ?>

	<div class="image-content section-magnet grid-item span-12 fit-h">

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
			height="100%" width="auto">
			<noscript>
				<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $caption ?>" width="100%" height="auto" />
			</noscript>

		<?php endif ?>

		<?php if ($image->caption()->isNotEmpty()) echo '<h5>'.$image->caption()->html().'</h5>' ?> 
	</div>
	
	<?php endif ?>
	<?php endforeach ?>

</div>

<?php snippet('footer') ?>