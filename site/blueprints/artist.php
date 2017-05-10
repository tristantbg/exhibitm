<?php if(!defined('KIRBY')) exit ?>

title: Artist
pages:
  template:
    - edito
    - essay
    - interview
files: true
fields:
  title:
    label: Title
    type:  text
    width: 2/3
  job:
    label: Job title
    type: text
    width: 1/3
  text:
    label: Text
    type:  textarea