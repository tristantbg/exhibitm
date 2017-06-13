<?php

return function ($site, $pages, $page) {
	$themeBackColor = false;
	$themeTextColor = false;
	$loaderTitle = $site->title()->html();
	$projectsPage = page('projects');
	$everyone = $projectsPage->children()->visible();//->sortBy('uid', 'asc');

	return array(
	'projectsPage'	=> $projectsPage,
	'everyone' => $everyone,
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
