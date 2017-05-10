<?php if(!defined('KIRBY')) exit ?>

title: Theme
pages: false
files: true
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
  color:
    label: Background Color
    type: color
    width: 1/2
  textcolor:
    label: Text Color
    type: color
    default: FFFFFF
    required: true
    width: 1/2