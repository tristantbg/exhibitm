<?php if(!defined('KIRBY')) exit ?>

title: Edito
pages: false
files:
  fields:
    caption:
      label: Caption
      type: text
fields:
  prevnext: prevnext
  tab1:
    label: Infos
    type:  tabs
  title:
    label: Title
    type:  text
    width: 2/3
  featured:
    label: Featured image
    type: image
    width: 1/3
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
  medias:
    label: Images
    type: gallery
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