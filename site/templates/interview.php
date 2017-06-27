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

	<div id="interview-content" class="row">
		<?php foreach($page->interview()->toStructure() as $section): ?>

			<?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
			
		<?php endforeach ?>
	</div>
</div>

<?php snippet('footer') ?>