<?php

kirbytext::$tags['quote'] = array(
  'attr' => array(
    'align'
  ),
  'html' => function($tag) {

    $text = $tag->attr('quote');
    $align    = $tag->attr('align', 'right');

    $html = '<section class="exergue-section">';
	$html .= '<div class="exergue align-'.$align.'">';
	$html .= '« '.$text.' »';
	$html .= '</div>';
	$html .= '</section>';

    return $html;

  }
);