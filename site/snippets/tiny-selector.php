<div id="smallSelector">

	<?php $ptemplate = $page->intendedTemplate() ?>

	<?php if (in_array($ptemplate, array('artist','collaborator'))): ?>

	<div id="tiny-selector" class="groupSelector">
		<ul class="menu-selector selector-silent">
			<li class="is-selected"><span>Info About</span></li>
			<?php foreach (page('themes')->children()->visible() as $key => $theme): ?>
				<li><span href="<?= $site->url().'/projects/theme:'.tagslug($theme->title()) ?>"><?= $theme->title()->html() ?></span></li>
			<?php endforeach ?>
			<li><span href="<?= $site->url().'/projects' ?>">Everything</span></li>
			<li><span href="<?= $site->url().'/everyone' ?>">Everyone</span></li>
		</ul>
	</div>

	<?php elseif ($ptemplate == "projects"): ?>

	<div id="tiny-selector" class="groupSelector">
		<ul class="menu-selector selector-silent">
			<?php if($theme): ?>
				<li class="is-selected"><span href="<?= $site->url().'/projects/theme:'.$theme ?>"><?= tagunslug($theme) ?></span></li>
			<?php else: ?>
				<li class="is-selected"><span>Everything</span></li>
			<?php endif ?>
			<?php foreach (page('themes')->children()->visible() as $key => $t): ?>
				<?php if ($theme == null || tagslug($t->title()) != $theme): ?>
					<li><span href="<?= $site->url().'/projects/theme:'.tagslug($t->title()) ?>"><?= $t->title()->html() ?></span></li>
				<?php endif ?>
			<?php endforeach ?>
			<?php if($theme != null): ?>
				<li><span href="<?= $site->url().'/projects' ?>">Everything</span></li>
			<?php endif ?>
			<li><span href="<?= $site->url().'/everyone' ?>">Everyone</span></li>
		</ul>
	</div>

	<?php elseif (in_array($ptemplate, array('everyone'))): ?>

	<div id="tiny-selector" class="groupSelector">
		<ul class="menu-selector selector-silent">
			<li class="is-selected"><span>Everyone</span></li>
			<?php foreach (page('themes')->children()->visible() as $key => $theme): ?>
				<li><span href="<?= $site->url().'/projects/theme:'.tagslug($theme->title()) ?>"><?= $theme->title()->html() ?></span></li>
			<?php endforeach ?>
			<li><span href="<?= $site->url().'/projects' ?>">Everything</span></li>
		</ul>
	</div>

	<?php elseif (in_array($ptemplate, array('edito', 'essay', 'interview'))): ?>
	
	<?php $theme = tagslug($page->theme()->title()) ?>

	<div id="tiny-selector" class="groupSelector">
	<ul class="menu-selector selector-silent">
		<li class="is-selected"><span href="<?= $site->url().'/projects/theme:'.$theme ?>"><?= $page->theme()->title() ?></span></li>
		<?php foreach (page('themes')->children()->visible() as $key => $t): ?>
			<?php if ($theme == null || tagslug($t->title()) != $theme): ?>
				<li><span href="<?= $site->url().'/projects/theme:'.tagslug($t->title()) ?>"><?= $t->title()->html() ?></span></li>
			<?php endif ?>
		<?php endforeach ?>
		<li><span href="<?= $site->url().'/projects' ?>">Everything</span></li>
		<li><span href="<?= $site->url().'/everyone' ?>">Everyone</span></li>
	</ul>
	</div>

	<?php else: ?>

	<div id="tiny-selector" class="groupSelector">
		<ul class="menu-selector selector-silent">
			<li class="is-selected"><span>Theme</span></li>
			<?php foreach (page('themes')->children()->visible() as $key => $theme): ?>
				<li><span href="<?= $site->url().'/projects/theme:'.tagslug($theme->title()) ?>"><?= $theme->title()->html() ?></span></li>
			<?php endforeach ?>
			<li><span href="<?= $site->url().'/projects' ?>">Everything</span></li>
			<li><span href="<?= $site->url().'/everyone' ?>">Everyone</span></li>
		</ul>
	</div>

	<?php endif ?>

</div>