<?php

// image tag
kirbytext::$tags['image'] = array(
  'attr' => array(
    'width',
    'height',
    'alt',
    'text',
    'title',
    'class',
    'imgclass',
    'linkclass',
    'caption',
    'link',
    'target',
    'popup',
    'rel'
  ),
  'html' => function($tag) {

    $url     = $tag->attr('image');
    $srcset  = '';
    $alt     = $tag->attr('alt');
    $title   = $tag->attr('title');
    $link    = $tag->attr('link');
    $caption = $tag->attr('caption');
    $file    = $tag->file($url);

    // use the file url if available and otherwise the given url
    $url = thumb($file, array('width'=>1500))->url() ? $file->url() : url($url);

    // make srcset
	for ($i = 500; $i <= 2500; $i += 1000) $srcset .= thumb($file, array('width'=>$i))->url() . ' ' . $i . 'w,';

    // alt is just an alternative for text
    if($text = $tag->attr('text')) $alt = $text;

    // try to get the title from the image object and use it as alt text
    if($file) {

      if(empty($alt) and $file->caption() != '') {
        $alt = $file->caption();
      }

      if(empty($title) and $file->title() != '') {
        $title = $file->title();
      }

    }

    // at least some accessibility for the image
    if(empty($alt)) $alt = ' ';

    // link builder
    $_link = function($image) use($tag, $url, $link, $file) {

      if(empty($link)) return $image;

      // build the href for the link
      if($link == 'self') {
        $href = $url;
      } else if($file and $link == $file->filename()) {
        $href = $file->url();
      } else if($tag->file($link)) {
        $href = $tag->file($link)->url();
      } else {
        $href = $link;
      }

      return html::a(url($href), $image, array(
        'rel'    => $tag->attr('rel'),
        'class'  => $tag->attr('linkclass'),
        'title'  => $tag->attr('title'),
        'target' => $tag->target()
      ));

    };

    // image builder
    $_image = function($class) use($tag, $url, $srcset, $alt, $title) {
      return html::img($url, array(
        'width'  => '100%',
        'height' => 'auto',
        'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
        'data-src' => $url,
        'data-srcset' => $srcset,
        'data-sizes' => 'auto',
        'data-optimumx' => '1.5', 
        'class'  => 'lazyimg lazyload',
        'title'  => $title,
        'alt'    => $alt
      ));
    };

    if(kirby()->option('kirbytext.image.figure') or !empty($caption)) {
      $image  = $_link($_image($tag->attr('imgclass')));
      $figure = new Brick('figure');
      $figure->addClass($tag->attr('class'));
      $figure->append($image);
      if(!empty($caption)) {
        $figure->append('<figcaption>' . html($caption) . '</figcaption>');
      }
      return $figure;
    } else {
      $class = trim($tag->attr('class') . ' ' . $tag->attr('imgclass'));
      return $_link($_image($class)).'<noscript><img src="'.$url.'" alt="'.$alt.'" width="100%" height="auto" /></noscript>';
    }

  }
);