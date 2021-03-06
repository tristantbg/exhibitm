<?php

return function ($site, $pages, $page) {
	$themeBackColor = false;
	$themeTextColor = false;
	$loaderTitle = $site->title()->html();
	$author = $page->uid();
	$projectsPage = page('projects');
	$collabs = $projectsPage->grandChildren()->visible()->filter(function($p) use($author) {
  		return in_array($author, $p->collaborators()->split(','));
	});
	$authorProjects = $page->children()->visible();
	$projects = $authorProjects->merge($collabs);

	return array(
	'projectsPage'	=> $projectsPage,
	'projects' => $projects->sortBy('date', 'desc')->paginate(9),
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
