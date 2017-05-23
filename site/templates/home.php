<?php snippet('header') ?>

<div id="mainSelector">

	<div id="selectorTitle">
		<h1 class="title"><?php $iwant = c::get('iwant'); echo $iwant[0]; //echo $iwant[array_rand($iwant)] ?></h1>
	</div>

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
	<ul class="selector" id="author" name="author"><li class="selected" data-value="" keep default><span>People</span></li></ul>
	</div>

	<div id="selectorSubmit">
	<h1 class="title"><?php $now = c::get('now'); echo $now[0]; //echo $now[array_rand($now)] ?></h1>
	</div>

	<div id="selectorHelp">
		<div class="row center"><h2 event-target="feed">What's new ?</h2></div>
	</div>

</div>

<div id="feed">
	<script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
	<link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
	<ul class="juicer-feed" data-feed-id="exhibit"></ul>
</div>



<?php snippet('footer') ?>