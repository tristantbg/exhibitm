<?php snippet('header') ?>

<div id="page-content">
	<div id="page-infos" class="row">
	</div>

	<div id="everyone" class="row">
		<?php foreach ($everyone as $key => $people): ?>

			<div class="people-item">
				<a href="<?= $people->url() ?>">
					<h2><?= $people->title()->html() ?></h2>
					<p><?= $people->job()->html() ?></p>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>