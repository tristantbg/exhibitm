<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  pagetheme:
    label: Theme
    type: select
    options:
      light: Light
      dark: Dark
    default: light
    required: true
    width: 1/4
  text:
    label: Text
    type:  textarea