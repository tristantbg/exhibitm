<?php

class EssayPage extends Page {
  public function serialize() {
    return [
		'uid'		=> $this->uid(),
		'title'		=> $this->title()->html()->toString(),
		'theme'		=> [ 'title' => $this->theme()->html()->toString(), 'slug' => tagslug($this->theme())],
		'media'		=> [ 'title' => medianame($this->intendedTemplate()), 'slug' => tagslug($this->intendedTemplate())],
		'author'	=> [ 'title' => $this->parent()->title()->html()->toString(), 'slug' => tagslug($this->parent()->uid())],
		'url'		=> $this->url(),
    ];
  }
}

?>
