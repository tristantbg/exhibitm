<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
c::set('iwant', ['I want', 'Give me', 'I yearn for', 'Show me', 'Let me see', 'I demand', 'I need', 'I ask for', 'May I see', 'I require']);
c::set('now', ['Now', 'Right now', 'Please', 'Right away', 'Immediately', 'At once', 'Promptly']);

c::set('debug', true);
c::set('autobuster', true);
c::set('cache.driver', 'apc');
c::set('plugin.embed.video.lazyload', true);
c::set('plugin.embed.video.lazyload.btn', 'assets/images/play.png');
c::set('kirbytext.image.figure', false);
c::set('textarea.buttons', array(
  "h1",
  "h2",
  "bold",
  "italic",
  "blockquote",
  "link",
  "page",
  "email"
));
//Typo
c::set('typography', true);
c::set('typography.ordinal.suffix', false);
c::set('typography.fractions', false);
c::set('typography.dashes.spacing', false);
c::set('typography.hyphenation', false);
//c::set('typography.hyphenation.language', 'fr');
//c::set('typography.hyphenation.minlength', 5);
c::set('typography.hyphenation.headings', false);
c::set('typography.hyphenation.allcaps', false);
c::set('typography.hyphenation.titlecase', false);
//Settings
c::set('plugin.reveal.refresh', 0);
c::set('sitemap.exclude', array('error'));
c::set('thumb.quality', 100);
//c::set('thumbs.driver', 'im');
c::set('routes', array(
	array(
		'pattern' => 'themes/(:any)',
		'action'  => function($uid) {
			go("projects/theme:".$uid);
		}
	),
	array(
		'pattern' => 'robots.txt',
		'action' => function () {
			return new Response('User-agent: *
				Disallow: /content/*.txt$
				Disallow: /kirby/
				Disallow: /site/
				Disallow: /*.md$
				Sitemap: ' . u('sitemap.xml'), 'txt');
		}
		)
	));

kirby()->hook(['panel.file.upload', 'panel.file.replace'], function($image) {
  if ($image->type() == 'image') {
	   
		// Set luminance & update image metadata
		$image->update(array(
			'luminance'    => $image->getluminance()
		));

		
  }
});
