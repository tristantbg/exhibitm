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
  intro:
    label: Custom introduction
    type:  headline
  live:
    label: Show intro ?
    type:  toggle
  introtitle:
    label: Title
    type:  text
    width: 1/2
  introimage:
    label: Background Image
    type:  image
    width: 1/2
  introlink:
    label: Title link
    type:  url
    width: 1/2
  intropopup:
    label: Popup
    type:  toggle
    width: 1/2
  introlinks:
    label: Links
    type: structure
    style: table
    fields:
      linktitle:
        label: Link title
        type: text
        required: true
      linkurl:
        label: Link URL
        type: url
      popup:
        label: Popup
        type: toggle
