<?php snippet('header') ?>

<div id="mainSelector">

	<div id="selectorTitle">
		<h1 class="title"><?php $iwant = c::get('iwant'); echo $iwant[0]; //echo $iwant[array_rand($iwant)] ?></h1>
	</div>

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
	<ul class="selector" id="author" name="author"><li class="selected" data-value="" keep default>People</li></ul>
	</div>

	<div id="selectorSubmit">
	<h1 class="title"><?php $now = c::get('now'); echo $now[0]; //echo $now[array_rand($now)] ?></h1>
	</div>

	<div id="selectorHelp">
		<div class="grid-item col-4 left">I don't understand</div>
		<div class="grid-item col-4 center">What's new ?</div>
		<div class="grid-item col-4 right"><a href="<?= $projectsPage->url() ?>">I don't have time for this</a></div>
	</div>

</div>

<script>
	var loopTitles1 = <?= json_encode($iwant) ?>,
		loopTitles2 = <?= json_encode($now) ?>;
</script>



<?php snippet('footer') ?>