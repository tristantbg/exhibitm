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
	<div id="page-infos" class="row edito-infos">
		<?php snippet('project-infos', array('page' => $page, 'primaryCredits' => $primaryCredits)) ?>
	</div>

	<div id="interview-content" class="row l-toggle french">
		<?php foreach($page->interview()->toStructure() as $section): ?>

			<?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
			
		<?php endforeach ?>
	</div>

	<?php if ($page->interviewEnglish()->isNotEmpty()): ?>
		<div id="interview-content" class="row l-toggle english">
			<?php foreach($page->interviewEnglish()->toStructure() as $section): ?>

				<?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
				
			<?php endforeach ?>
		</div>

		<div id="language-switch"><span class="active" language-switch="fr">FR</span>&nbsp;|&nbsp;<span language-switch="en">EN</span></div>
	<?php endif ?>

</div>

<div id="scroll-to-top" event-target="scroll-to-top">
	<div class="row center"><span></span></div>
</div>

<?php snippet('footer') ?>