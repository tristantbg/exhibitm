<?php snippet('header') ?>

<div id="page-content" class="magnet">
	<div class="row section-magnet fp-auto-height">
		<div id="page-infos" class="row">
			<div class="row center">
				<h1 class="title"><?= $page->title()->html() ?></h1>
				<h2><?= $page->text()->kt() ?></h2>
			</div>
		</div>
	</div>

</div>

<?php snippet('footer') ?>