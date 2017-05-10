<?php

class ThemePage extends Page {
  public function serialize() {
    return [
		'title'		=> $this->title()->html()->toString(),
		'slug'		=> tagslug($this->title()),
		'url'		=> $this->url(),
    ];
  }
}

?>
