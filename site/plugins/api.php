<?php

$prefix = "api";

kirby()->routes([
  [
    'method' => 'GET',
    'pattern' => "{$prefix}/projects",
    'action' => function() {

    if($author = param('author')) {
        if ($page = page('projects/'.$author)) {
            $projects = $page->children()->visible();
        }
        else {
            return response::json('error');
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


      // Get the projects pages
      
      $data = [];

      // Transform for API delivery
      foreach ($projects as $project) {
        $data[] = $project->serialize();
      }

      return response::json($data);
    }
  ],
  [
    'method' => 'GET',
    'pattern' => "{$prefix}/themes",
    'action' => function() {

    
    $themes = page('themes')->children();
      
      $data = [];

      // Transform for API delivery
      foreach ($themes as $theme) {
        $data[] = $theme->serialize();
      }

      return response::json($data);
    }
  ],
  [
    'method' => 'GET',
    'pattern' => "{$prefix}/random",
    'action' => function() {

    
    if($author = param('author')) {
        if ($page = page('projects/'.$author)) {
            $projects = $page->children()->visible();
        }
        else {
            return response::json('error');
        }
    } else {
        $projects = page('projects')->children()->visible()->filterBy('intendedTemplate','==','artist')->children()->visible();
    }
    
    if($theme = param('theme')) {
        $projects = $projects->filterBy('theme','==',tagunslug($theme));
    } 
    if($media = param('media')) {
        $projects = $projects->filterBy('intendedTemplate',$media);
    }

    $project = $projects->shuffle()->first();


    // Transform for API delivery
   	$data = $project->serialize();

    return response::json($data);
    }
  ]

]);

?>