<?php snippet('header') ?>

<?php 
$ratio = 2/3;
$author = $page->title()
?>

<div id="page-content">
	<div id="page-infos" class="row">
		<div class="row center">
			<h1 class="title"><?= $author->html() ?></h1>
			<h2><?= $page->job()->html() ?></h2>
		</div>
		<div class="row pt-3 pb-10">
			<?php if($page->text()->isNotEmpty()): ?>
				<div class="grid-item span-4 off-4 small"><?= $page->text()->kt() ?></div>
			<?php endif ?>
		</div>
	</div>

	<div id="related-projects" class="row">
		<?php foreach ($projects as $key => $project): ?>
		<?php $image = $project->featured()->toFile(); ?>
		<?php 
		$themePage = page('themes/'.tagslug($project->theme()));
		if ($themePage && $themePage->color()->isNotEmpty()) {
			$themeBackColor = $themePage->color();
			$themeTextColor = $themePage->textcolor();
		}
		?>
			<div class="project-item<?php e(!$image, ' no-featured') ?>"<?php e(!$image && $themeBackColor, ' style="background-color: '.$themeBackColor.'; color: '.$themeTextColor.'"') ?>>
				<a href="<?= $project->url() ?>">
					<?php if($image): ?>
					<?php 
					$srcset = '';
					$src = thumb($image, array('width' => 100, 'height' => 100/$ratio, 'crop' => true))->url();
					$datasrc = thumb($image, array('width' => 1000, 'height' => 1000/$ratio, 'crop' => true))->url();
					for ($i = 500; $i <= 1000; $i += 500) $srcset .= thumb($image, array('width' => $i, 'height' => $i/$ratio, 'crop' => true))->url() . ' ' . $i . 'w,';
					?>

					<img 
					src="<?= $src ?>" 
					data-src="<?= $datasrc ?>" 
					data-srcset="<?= $srcset ?>" 
					data-sizes="auto" 
					data-optimumx="1.5" 
					class="lazyimg lazyload" 
					width="100%" height="auto">
					<?php endif ?>
					<div class="overlay<?php e($image && $image->luminance()->int() < 100, ' dark') ?>">
						<div class="inner">
							<h2><?= $project->theme()->html() ?></h2>
							<h2><?= medianame($project->intendedTemplate()) ?></h2>
							<h2><?= $project->parent()->title()->html() ?></h2>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>