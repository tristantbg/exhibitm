<div id="smallSelector">

	<div id="selectorTitle" class="right">
		<h2>I want</h2>
	</div>

	<?php $ptemplate = $page->intendedTemplate() ?>

	<?php if (in_array($ptemplate, array('artist','collaborator'))): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="menu-selector selector" id="theme" name="theme">
	<li class="is-selected" data-value="" keep default><span>Theme</span></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="menu-selector selector" id="media" name="media">
	<li class="is-selected" data-value="" keep default><span>Media</span></li>
	<li data-value="every" keep><span>Every</span></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<li data-value="everyone" keep><span>Everyone</span></li>
	<li class="is-selected" data-value="<?= tagslug($page->uid()) ?>"><span><?= $page->title()->html() ?></span></li>
	</ul>
	</div>

	<?php elseif ($ptemplate == "projects"): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="menu-selector selector<?php e($theme, ' is-selecting') ?>" id="theme" name="theme">
	<?php if($theme): ?>
	<li data-value="" keep default><span>Theme</span></li>
	<li class="is-selected" data-value="<?= $theme ?>"><span><?= tagunslug($theme) ?></span></li>
	<?php else: ?>
	<li class="is-selected" data-value="" keep default><span>Theme</span></li>
	<?php endif ?>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="menu-selector selector<?php e($media, ' is-selecting') ?>" id="media" name="media">
	<li data-value="" keep default><span>Media</span></li>
	<li<?php e(!$media, ' class="is-selected"') ?> data-value="every" keep><span>Every</span></li>
	<?php if($media): ?>
	<li class="is-selected" data-value="<?= $media ?>"><span><?= medianame($media) ?></span></li>
	<?php endif ?>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="menu-selector selector<?php e($author, ' is-selecting') ?>" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<li data-value="everyone" keep><span>Everyone</span></li>
	<?php if($author): ?>
	<li class="is-selected" data-value="<?= $author ?>"><span><?= tagunslug($author) ?></span></li>
	<?php endif ?>
	</ul>
	</div>

	<?php elseif (in_array($ptemplate, array('error','everyone'))): ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="theme" name="theme">
	<li class="is-selected" data-value="" keep default><span>Theme</span></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="media" name="media">
	<li class="is-selected" data-value="" keep default><span>Media</span></li>
	<li data-value="every" keep><span>Every</span></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="author" name="author">
	<li<?php e($ptemplate == 'everyone', '', ' class="is-selected"') ?> data-value="" keep default><span>People</span></li>
	<li<?php e($ptemplate == 'everyone', ' class="is-selected"') ?> data-value="everyone" keep><span>Everyone</span></li>
	</ul>
	</div>

	<?php else: ?>

	<div id="themeSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="theme" name="theme">
	<li data-value="" keep default><span>Theme</span></li>
	<li class="is-selected" data-value="<?= tagslug($page->theme()) ?>"><span><?= $page->theme()->html() ?></span></li>
	</ul>
	</div>

	<div id="mediaSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="media" name="media">
	<li data-value="" keep default><span>Media</span></li>
	<li data-value="every" keep><span>Every</span></li>
	<li class="is-selected" data-value="<?= tagslug($page->intendedTemplate()) ?>"><span><?= medianame($page->intendedTemplate()) ?></span></li>
	</ul>
	</div>

	<div id="authorSelector" class="groupSelector">
	<ul class="menu-selector selector is-selecting" id="author" name="author">
	<li data-value="" keep default><span>People</span></li>
	<li data-value="everyone" keep><span>Everyone</span></li>
	<li class="is-selected" data-value="<?= tagslug($page->parent()->uid()) ?>"><span><?= $page->parent()->title()->html() ?></span></li>
	</ul>
	</div>

	<?php endif ?>

	<div id="selectorSubmit" class="left">
		<h2>Now</h2>
	</div>

</div>