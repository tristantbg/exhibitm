<div id="smallSelector">

	<div id="selectorTitle" class="right">
		<h2>I want</h2>
	</div>

	<?php if (in_array($page->intendedTemplate(), array('artist','collaborator'))): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector" id="theme" name="theme">
	<li class="selected" data-value="" keep default><span>Theme</span></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector" id="media" name="media">
	<li class="selected" data-value="" keep default><span>Media</span></li>
	<li data-value="every" keep><span>Every</span></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector is-selecting" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<li class="selected" data-value="<?= tagslug($page->uid()) ?>"><span><?= $page->title()->html() ?></span></li>
	</ul>
	</div>

	<?php elseif ($page->intendedTemplate() == "projects"): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector<?php e($theme, ' is-selecting') ?>" id="theme" name="theme">
	<?php if($theme): ?>
	<li data-value="" keep default><span>Theme</span></li>
	<li class="selected" data-value="<?= $theme ?>"><span><?= tagunslug($theme) ?></span></li>
	<?php else: ?>
	<li class="selected" data-value="" keep default><span>Theme</span></li>
	<?php endif ?>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector<?php e($media, ' is-selecting') ?>" id="media" name="media">
	<li data-value="" keep default><span>Media</span></li>
	<li<?php e(!$media, ' class="selected"') ?> data-value="every" keep><span>Every</span></li>
	<?php if($media): ?>
	<li class="selected" data-value="<?= $media ?>"><span><?= medianame($media) ?></span></li>
	<?php endif ?>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector<?php e($author, ' is-selecting') ?>" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<?php if($author): ?>
	<li class="selected" data-value="<?= $author ?>"><span><?= tagunslug($author) ?></span></li>
	<?php endif ?>
	</ul>
	</div>

	<?php else: ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="selector is-selecting" id="theme" name="theme">
	<li data-value="" keep default><span>Theme</span></li>
	<li class="selected" data-value="<?= tagslug($page->theme()) ?>"><span><?= $page->theme()->html() ?></span></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="selector is-selecting" id="media" name="media">
	<li data-value="" keep default><span>Media</span></li>
	<li data-value="every" keep><span>Every</span></li>
	<li class="selected" data-value="<?= tagslug($page->intendedTemplate()) ?>"><span><?= medianame($page->intendedTemplate()) ?></span></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="selector is-selecting" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<li class="selected" data-value="<?= tagslug($page->parent()->uid()) ?>"><span><?= $page->parent()->title()->html() ?></span></li>
	</ul>
	</div>

	<?php endif ?>

	<div id="selectorSubmit" class="left">
	<h2>Now</h2>
	</div>

</div>