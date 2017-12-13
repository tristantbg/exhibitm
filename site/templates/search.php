<?php snippet('header') ?>

<div id="mainSelector">

	<div id="selectorTitle">
		<h2 class="title"><?php $iwant = c::get('iwant'); echo $iwant[0]; //echo $iwant[array_rand($iwant)] ?></h2>
	</div>

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
	<ul class="menu-selector selector" id="author" name="author">
	<li class="is-selected" data-value="" keep default><span>People</span></li>
	<li data-value="everyone" keep><span>Everyone</span></li>
	</ul>
	</div>

	<div id="selectorSubmit">
	<h2 class="title"><?php $now = c::get('now'); echo $now[0]; //echo $now[array_rand($now)] ?></h2>
	</div>

</div>

<?php snippet('footer') ?>