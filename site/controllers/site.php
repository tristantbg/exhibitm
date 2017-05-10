<?php

return function ($site, $pages, $page) {
	$themeBackColor = false;
	$themeTextColor = false;
	if ($page->theme()->isNotEmpty()) {
		$themePage = page('themes/'.tagslug($page->theme()));
		if ($themePage && $themePage->color()->isNotEmpty()) {
			$themeBackColor = $themePage->color();
			$themeTextColor = $themePage->textcolor();
		}
		
	}

	if(in_array($page->intendedTemplate(), array('edito','essay','interview'))){
		$loaderTitle = $page->theme()->html();
	} else {
		$loaderTitle = $site->title()->html();
	}

	return array(
	'projectsPage'	=> page('projects'),
	'loaderTitle'	=> $loaderTitle,
	'themeBackColor'	=> $themeBackColor,
	'themeTextColor'	=> $themeTextColor
	);
}

?>
