<?php if(!defined('KIRBY')) exit ?>

title: Themes
options:
  delete: false
  url: false
  template: false
pages:
  template: theme
files: true
deletable: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
