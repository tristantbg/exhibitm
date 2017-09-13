<?php snippet('header') ?>

<?php 
$ratio = 2/3;
$author = $page->title()
?>

<div id="page-content">
	<div id="page-infos" class="row">
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
					<div class="overlay<?php e($image && $image->luminance()->int() < 80, ' dark') ?>">
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
	<?php if($projects->pagination()->hasPages()): ?>
	<!-- pagination -->
	<nav id="pagination">

	  <?php if($projects->pagination()->hasNextPage()): ?>
	  <a class="next" href="<?php echo $projects->pagination()->nextPageURL() ?>"><h2>&lsaquo; Prev</h2></a>
	  <?php endif ?>

	  <?php if($projects->pagination()->hasPrevPage()): ?>
	  <a class="prev" href="<?php echo $projects->pagination()->prevPageURL() ?>"><h2>Next &rsaquo;</h2></a>
	  <?php endif ?>

	</nav>
	<?php endif ?>
</div>

<?php snippet('footer') ?>