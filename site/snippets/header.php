<!DOCTYPE html>
<html lang="en" class="no-js<?php e($page->pagetheme() == 'dark', ' dark') ?>">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="google" content="notranslate" />
	<link rel="canonical" href="<?php echo html($page->url()) ?>" />
	<?php if($page->isHomepage()): ?>
		<title><?= $site->title()->html() ?></title>
	<?php elseif(in_array($page->intendedTemplate(), array('edito','interview','essay'))): ?>
		<title><?= $page->title()->html().', '.$page->parent()->title()->html() ?> | <?= $site->title()->html() ?></title>
	<?php else: ?>
		<title><?= $page->title()->html().' | '.$site->title()->html() ?></title>
	<?php endif ?>
	<?php if($page->isHomepage()): ?>
		<meta name="description" content="<?= $site->description()->html() ?>">
	<?php else: ?>
		<meta name="DC.Title" content="<?= $page->title()->html() ?>" />
		<?php if(!$page->text()->empty()): ?>
			<meta name="description" content="<?= $page->text()->excerpt(250) ?>">
			<meta name="DC.Description" content="<?= $page->text()->excerpt(250) ?>"/ >
			<meta property="og:description" content="<?= $page->text()->excerpt(250) ?>" />
		<?php else: ?>
			<meta name="description" content="<?= $site->description()->html() ?>">
			<meta name="DC.Description" content="<?= $site->description()->html() ?>"/ >
			<meta property="og:description" content="<?= $site->description()->html() ?>" />
		<?php endif ?>
	<?php endif ?>
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">
	<?php if($page->isHomepage()): ?>
		<meta itemprop="name" content="<?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $site->title()->html() ?>" />
	<?php else: ?>
		<meta itemprop="name" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>" />
	<?php endif ?>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= html($page->url()) ?>" />
	<?php if($page->content()->name() == "project"): ?>
		<?php if (!$page->featured()->empty()): ?>
			<meta property="og:image" content="<?= $page->featured()->toFile()->width(1200)->url() ?>"/>
		<?php endif ?>
	<?php else: ?>
		<?php if(!$site->ogimage()->empty()): ?>
			<meta property="og:image" content="<?= $site->ogimage()->toFile()->width(1200)->url() ?>"/>
		<?php endif ?>
	<?php endif ?>

	<meta itemprop="description" content="<?= $site->description()->html() ?>">
	<!-- <link rel="shortcut icon" href="<?php //url('assets/images/favicon.ico') ?>">
	<link rel="icon" href="<?php //url('assets/images/favicon.ico') ?>" type="image/x-icon"> -->

	<?php 
	echo css('assets/css/build/build.min.css');
	echo js('assets/js/vendor/modernizr.min.js');
	?>
	
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="<?= url('assets/js/vendor/jquery.min.js') ?>">\x3C/script>')</script>

	<?php if(!$site->customcss()->empty()): ?>
		<style type="text/css">
			<?php echo $site->customcss()->html() ?>
		</style>
	<?php endif ?>

</head>
<body<?php e(!$page->isHomepage() && $page->intendedTemplate() != "search", ' class="page"') ?>>

<div id="outdated">
	<div class="inner">
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
	<br>Please <a href="http://outdatedbrowser.com" target="_blank">upgrade your browser</a> to improve your experience.</p>
	</div>
</div>

<div class="loader"<?php e($themeBackColor, ' style="background-color: '.$themeBackColor.'; color: '.$themeTextColor.'"') ?>>
	<h1><?= $loaderTitle ?></h1>
</div>

<header>
	
	<div id="site-title">
	<a href="<?= $site->url() ?>"><h1><?= $site->title()->html() ?></h1></a>
	</div>

	<?php if(!$page->isHomepage() && $page->intendedTemplate() != "search") { snippet('tiny-selector'); } ?>

</header>

<?php if (in_array($page->intendedTemplate(), array('artist','collaborator','edito','interview','essay'))): ?>
<div id="mobile-selector">
	<a href="<?= page("search")->url() ?>"><h2>I want</h2></a>
</div>
<?php endif ?>

<?php if($page->isHomepage()) { snippet('landing'); } ?>

<div id="container"<?php e($page->intendedTemplate() == "edito", ' class="edito"') ?>>