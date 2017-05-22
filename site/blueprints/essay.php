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
  featured:
    label: Featured image
    type: image
    width: 1/2
  date:
    label: Date
    type: date
    width: 1/2
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
  tab4:
    label: Collaborators
    type:  tabs
  collaborators:
    type: checkboxes
    options: query
    query:
      page: projects
      fetch: children
      value: '{{uid}}'
      text: '{{title}}'
      sort: title