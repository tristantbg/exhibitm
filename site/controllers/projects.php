<?php

return function ($site, $pages, $page) {
	$projectsPage = page('projects');
	$themeBackColor = false;
	$themeTextColor = false;
	$theme = false;
	$media = false;
	$author = false;
	$loaderTitle = $site->title()->html();
	if($author = param('author')) {
        if ($page = page('projects/'.$author)) {
            $projects = $page->children()->visible();
        }
    } else {
        $projects = page('projects')->grandChildren()->visible();
    }
    if($theme = param('theme')) {
        $projects = $projects->filterBy('theme','==',tagunslug($theme));
    } 
    $media = param('media');
    if($media && !in_array($media, array('every'))) {
        $projects = $projects->filterBy('intendedTemplate',$media);
    }

	return array(
	'projectsPage'	=> $projectsPage,
	'projects' => $projects->sortBy('title', 'desc'),
	'theme'	=> $theme,
	'media'	=> $media,
	'author'	=> $author,
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
