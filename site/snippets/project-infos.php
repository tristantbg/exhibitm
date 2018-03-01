<?php
$author = $page->parent()->title();
$primaryCount = count($primaryCredits);

// Subtitle
$subtitle = $page->subtitle();
if ($subtitle->isNotEmpty()) {
	$subtitleCount = 1;
}
else {
	$subtitleCount = 0;
}

// Text credits in Object
$texts = [];
if ($page->text()->isNotEmpty()) {
	array_push($texts, $page->text());
}
if ($page->additionaltext()->isNotEmpty()) {
	array_push($texts, $page->additionaltext());
}
$texts = structure($texts);
$textsCount = count($texts);

// Pattern => [primary_count, subtitle_count, texts_count]
$pattern = [$primaryCount, $subtitleCount, $textsCount];
$data = array("primaryCredits" => $primaryCredits, "subtitle" => $subtitle, "texts" => $texts);
?>

<div class="row center">
	<h1 class="title"><?= $author->html() ?></h1>
	<h2><?= $page->theme()->html().' Issue' ?></h2>
</div>
<div class="row pt-5<?php e($page->intendedTemplate() != "edito", " pb-10") ?>">
	<?php 
	switch ($pattern) {
		case [4, 0, 2]:
			snippet('project-infos/a1', $data);
		break;
		case [3, 0, 2]:
			snippet('project-infos/a2', $data);
		break;
		case [2, 0, 2]:
			snippet('project-infos/a3', $data);
		break;
		case [1, 0, 2]:
			snippet('project-infos/a4', $data);
		break;
		case [4, 0, 1]:
			snippet('project-infos/b1', $data);
		break;
		case [3, 0, 1]:
			snippet('project-infos/c2', $data);
		break;
		case [2, 0, 1]:
			snippet('project-infos/c3', $data);
		break;
		case [1, 0, 1]:
			snippet('project-infos/c4', $data);
		break;
		case [4, 0, 0]:
			snippet('project-infos/d1', $data);
		break;
		case [3, 0, 0]:
			snippet('project-infos/d2', $data);
		break;
		case [2, 0, 0]:
			snippet('project-infos/d3', $data);
		break;
		case [1, 0, 0]:
			snippet('project-infos/d4', $data);
		break;
		case [4, 1, 2]:
			snippet('project-infos/e1', $data);
		break;
		case [3, 1, 2]:
			snippet('project-infos/e2', $data);
		break;
		case [2, 1, 2]:
			snippet('project-infos/e3', $data);
		break;
		case [1, 1, 2]:
			snippet('project-infos/e4', $data);
		break;
		case [4, 1, 1]:
			snippet('project-infos/f1', $data);
		break;
		case [3, 1, 1]:
			snippet('project-infos/g2', $data);
		break;
		case [2, 1, 1]:
			snippet('project-infos/g3', $data);
		break;
		case [1, 1, 1]:
			snippet('project-infos/g4', $data);
		break;
		case [4, 1, 0]:
			snippet('project-infos/e1', $data);
		break;
		case [3, 1, 0]:
			snippet('project-infos/e2', $data);
		break;
		case [2, 1, 0]:
			snippet('project-infos/e3', $data);
		break;
		case [1, 1, 0]:
			snippet('project-infos/e4', $data);
		break;
	}
	?>
</div>