<div id="smallSelector">

	<div id="selectorTitle" class="right">
		<h2>I want</h2>
	</div>

	<?php if (in_array($page->intendedTemplate(), array('artist','collaborator'))): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector" id="theme" name="theme">
	<li class="selected" data-value="" keep default>Theme</li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector" id="media" name="media">
	<li class="selected" data-value="" keep default>Media</li>
	<li data-value="every" keep>Every</li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector is-selecting" id="author" name="author">
	<li data-value="" keep default>People</li>
	<li class="selected" data-value="<?= tagslug($page->uid()) ?>"><?= $page->title()->html() ?></li>
	</ul>
	</div>

	<?php elseif ($page->intendedTemplate() == "projects"): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector<?php e($theme, ' is-selecting') ?>" id="theme" name="theme">
	<?php if($theme): ?>
	<li data-value="" keep default>Theme</li>
	<li class="selected" data-value="<?= $theme ?>"><?= tagunslug($theme) ?></li>
	<?php else: ?>
	<li class="selected" data-value="" keep default>Theme</li>
	<?php endif ?>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector<?php e($media, ' is-selecting') ?>" id="media" name="media">
	<li data-value="" keep default>Media</li>
	<li<?php e(!$media, ' class="selected"') ?> data-value="every" keep>Every</li>
	<?php if($media): ?>
	<li class="selected" data-value="<?= $media ?>"><?= medianame($media) ?></li>
	<?php endif ?>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector<?php e($author, ' is-selecting') ?>" id="author" name="author">
	<li data-value="" keep default>People</li>
	<?php if($author): ?>
	<li class="selected" data-value="<?= $author ?>"><?= tagunslug($author) ?></li>
	<?php endif ?>
	</ul>
	</div>

	<?php else: ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector is-selecting" id="theme" name="theme">
	<li data-value="" keep default>Theme</li>
	<li class="selected" data-value="<?= tagslug($page->theme()) ?>"><?= $page->theme()->html() ?></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector is-selecting" id="media" name="media">
	<li data-value="" keep default>Media</li>
	<li data-value="every" keep>Every</li>
	<li class="selected" data-value="<?= tagslug($page->intendedTemplate()) ?>"><?= medianame($page->intendedTemplate()) ?></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector is-selecting" id="author" name="author">
	<li data-value="" keep default>People</li>
	<li class="selected" data-value="<?= tagslug($page->parent()->uid()) ?>"><?= $page->parent()->title()->html() ?></li>
	</ul>
	</div>

	<?php endif ?>

	<div id="selectorSubmit" class="left">
	<h2>Now</h2>
	</div>

</div>