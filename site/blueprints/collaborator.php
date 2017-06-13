<?php if(!defined('KIRBY')) exit ?>

title: Collaborator
pages: false
files: true
icon: user-o
fields:
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