<?php

return function ($site, $pages, $page) {
	$themeBackColor = false;
	$themeTextColor = false;
	$loaderTitle = $site->title()->html();
	$projects = $page->children()->visible();

	return array(
	'projectsPage'	=> page('projects'),
	'projects' => $projects->sortBy('date', 'desc'),
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
