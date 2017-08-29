<?php if(!defined('KIRBY')) exit ?>

title: Projects
pages:
  template:
    - artist
    - collaborator
files: true
fields:
  title:
    label: Title
    type:  text
  pageindex:
    label: Projects
    type: index
    options: grandchildren
    rows: 100
    columns:
      title: Title
      date: Date
      theme: Theme
      uri: Slug