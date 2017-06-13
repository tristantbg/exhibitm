<?php snippet('header') ?>

<?php $author = $page->parent()->title() ?>

<div id="page-content">
	<div id="page-infos" class="row">
		<div class="row center">
			<h1 class="title"><?= $author->html() ?></h1>
			<h2><?= $page->theme()->html().' Issue' ?></h2>
		</div>
		<div class="row pt-3 pb-10">
			<?php if($page->text()->isNotEmpty()): ?>
				<div class="grid-item col-6 lead right" md="center pb-5"><?= $page->credits()->kt() ?></div>
				<div class="grid-item col-6 small"><?= $page->text()->kt() ?></div>
			<?php else: ?>
				<div class="grid-item span-8 off-2 lead center"><?= $page->credits()->kt() ?></div>
			<?php endif ?>
		</div>
	</div>

	<div id="interview-content" class="row">
		<?php foreach($page->interview()->toStructure() as $section): ?>

			<?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
			
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>