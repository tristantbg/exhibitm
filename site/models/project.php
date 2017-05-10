<?php

class ProjectPage extends Page {
  public function serialize() {
    return [
      'uid'     => $this->uid(),
      'url'     => $this->url(),
      'title'   => $this->title()->html()->toString(),
      'text'    => $this->text()->kirbytext()->toString()
    ];
  }
}

?>
