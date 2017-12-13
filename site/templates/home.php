<?php snippet('header') ?>

<?php if ($site->juicer()->isNotEmpty()): ?>
<div id="feed">
	<script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
	<!-- <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" /> -->
	<ul class="juicer-feed" data-feed-id="<?= $site->juicer() ?>" data-per="10"></ul>
</div>
<?php endif ?>



<?php snippet('footer') ?>