<?php

// STOP IF NOT IN LIVE MODE
if (!$page->live()->bool()) {
	return;
}

$title = $page->introtitle()->html();
$image = $page->introimage();

?>

<div id="intro" class="center lazyload"<?php e($image->isNotEmpty(), ' data-bg="'.$image->toFile()->width(3000)->url().'"') ?>>
	<div class="site-title row" event-target="enter">
		<h1><?= $site->title()->html() ?></h1>
	</div>

	<div class="inner contained">
		
		<?php if($page->introtitle()->isNotEmpty()): ?>
			<?php if ($page->introlink()->isNotEmpty()): ?>
			<a href="<?= $page->introlink() ?>"<?php e($page->intropopup()->bool(), ' target="_blank"') ?> rel="nofollow">
			<?php endif ?>
			<h2 class="title"<?php e($page->introlink()->empty(), ' event-target="enter"') ?>><?= $page->introtitle()->html() ?></h2>
			<?php if ($page->introlink()->isNotEmpty()): ?>
			</a>
			<?php endif ?>
		<?php endif ?>

		<div id="intro-links">
			<div class="link-item" event-target="enter">
				<h2>Enter the website</h2>
			</div>
			<?php foreach($page->introlinks()->toStructure() as $key => $link): ?>
				<?php $haslink = $link->linkurl()->isNotEmpty() ?>
				<div class="link-item">
					<h2>
						<?php if ($haslink): ?>
						<a href="<?= $link->linkurl() ?>"<?php e($link->popup()->bool(), ' target="_blank"') ?> rel="nofollow">
						<?php endif ?>
						<?= $link->linktitle()->html() ?>
						<?php if ($haslink): ?>
						</a>
						<?php endif ?>
					</h2>
				</div>
			<?php endforeach ?>
		</div>

	</div>

</div>