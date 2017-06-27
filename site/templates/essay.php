<?php snippet('header') ?>

<?php 
$author = $page->parent()->title();
// Primary credits in Object
$primaryCredits = [];
if ($page->pcredits1()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits1());
}
if ($page->pcredits2()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits2());
}
if ($page->pcredits3()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits3());
}
if ($page->pcredits4()->isNotEmpty()) {
	array_push($primaryCredits, $page->pcredits4());
}
$primaryCredits = structure($primaryCredits);
?>

<div id="page-content">
	<div id="page-infos" class="row">
		<?php snippet('project-infos', array('page' => $page, 'primaryCredits' => $primaryCredits)) ?>
	</div>

	<div id="essay-content" class="row">
		<?= $page->essay()->kt() ?>
	</div>
</div>

<?php snippet('footer') ?>