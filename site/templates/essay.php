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

	<div id="essay-content" class="row french">
		<?= $page->essay()->kt() ?>
	</div>

	<?php if ($page->essayEnglish()->isNotEmpty()): ?>
		<div id="essay-content" class="row english">
			<?= $page->essayEnglish()->kt() ?>
		</div>

		<div id="language-switch"><span class="active" language-switch="fr">FR</span>&nbsp;|&nbsp;<span language-switch="en">EN</span></div>
	<?php endif ?>
</div>

<div id="scroll-to-top" event-target="scroll-to-top">
	<div class="row center"><span></span></div>
</div>

<?php snippet('footer') ?>