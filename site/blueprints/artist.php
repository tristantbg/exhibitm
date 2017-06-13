<?php if(!defined('KIRBY')) exit ?>

title: Artist
pages:
  template:
    - edito
    - essay
    - interview
icon: user
files: true
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
    width: 2/3
  job:
    label: Job title
    type: text
    width: 1/3
  logo:
    label: Logo
    type: image
    width: 2/3
  logosize:
    label: Logo Width (%)
    type: number
    min: 1
    max: 100
    width: 1/3
  text:
    label: Text
    type:  textarea