<?php
if($page->landingTitle()->isNotEmpty()){
	$title = $page->landingTitle()->html();
} else if($page->landingTitleLink()->isNotEmpty() && $link = page($page->landingTitleLink()->value())) {
	$title = $link->title()->html();
}

if($page->landingSubtitle()->isNotEmpty()){
	$subtitle = $page->landingSubtitle()->html();
} else if($page->landingSubtitleLink()->isNotEmpty() && $link = page($page->landingSubtitleLink()->value())) {
	$subtitle = $link->title()->html();
}
$image = $page->landingimage()->toFile();
$search = page("search");
?>

<div id="landing" class="center lazyload"<?php if($image) echo ' data-bg="'.$image->width(3000)->url().'"' ?>>

	<div class="inner contained">
		
		<?php if($title): ?>
			<?php if ($link = page($page->landingTitleLink()->value())): ?>
				<a href="<?= $link->url() ?>">
			<?php endif ?>
			<h2 class="title"><?= $title ?></h2>
			<?php if ($link): ?>
				</a>
			<?php endif ?>
		<?php endif ?>

		<?php if($subtitle): ?>
			<?php if ($link = page($page->landingSubtitleLink()->value())): ?>
				<a href="<?= $link->url() ?>">
			<?php endif ?>
			<h2 class="title"><?= $subtitle ?></h2>
			<?php if ($link): ?>
				</a>
			<?php endif ?>
		<?php endif ?>
	
	</div>

	<div id="intro-links" class="contained">
		<div class="link-item"><a event-target="about">About</a></div>
		<div class="link-item">
			<a href="<?= $search->url() ?>"><?= $search->title()->html() ?></a>
		</div>
		<?php if ($page->shopLink()->isNotEmpty()): ?>
			<div class="link-item">
				<a href="<?= $page->shopLink() ?>" target="_blank" rel="nofollow noopener">Shop</a>
			</div>
		<?php endif ?>
	</div>

	<?php if ($site->juicer()->isNotEmpty()): ?>
	<div id="arrow">
		<div class="row center"><h2 event-target="feed">&nbsp;</h2></div>
	</div>
	<?php endif ?>
	
	<div id="about-text">
		<div>
			<?= $page->text()->kt() ?>
		</div>
		<div class="primary-credits">
			<?= $page->aboutText()->kt() ?>
		</div>
		<div>
			<a href="<?= page("everyone")->url() ?>">All of our contributors</a>
		</div>
	</div>

</div>