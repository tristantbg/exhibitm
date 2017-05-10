<?php if(!defined('KIRBY')) exit ?>

title: Essay
pages: false
files: true
fields:
  prevnext: prevnext
  tab1:
    label: Infos
    type:  tabs
  title:
    label: Title
    type:  text
  credits:
    label: Credits
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  text:
    label: Text
    type:  textarea
    buttons:
      - page
      - link
      - italic
    width: 1/2
  tab2:
    label: Content
    type:  tabs
  essay:
    label: Essay
    type:  textarea
  tab3:
    label: Theme
    type:  tabs
  theme:
    type: radio 
    options: query
    query:
      page: themes
      fetch: children
      value: '{{title}}'
      text: '{{title}}'