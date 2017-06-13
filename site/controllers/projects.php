<?php

return function ($site, $pages, $page) {
	$projectsPage = page('projects');
	$themeBackColor = false;
	$themeTextColor = false;
	$theme = false;
	$media = false;
	$author = false;
	$loaderTitle = $site->title()->html();
	$author = param('author');
	if($author && $author != 'everyone') {
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
	'projects' => $projects->sortBy('date', 'desc')->paginate(9),
	'theme'	=> $theme,
	'media'	=> $media,
	'author'	=> $author,
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
