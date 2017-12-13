<?php if(!defined('KIRBY')) exit ?>

title: Edito
pages: false
icon: camera
files:
  fields:
    itemsize:
      label: Image Size
      type: radio
      options:
        small : Small
        medium : Medium
        large : Large
      columns: 3
      default: large
    imagecredits:
      label: Image Credits
      type:  textarea
      buttons:
        - bold
        - page
        - link
        - italic
fields:
  reveal: reveal
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
    type: datetime
    default: today now
    required: true
    width: 1/2
  headlineCreditsPrimary:
    label: Primary Credits
    type: headline
  pcredits1:
    label: Credits
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  pcredits1:
    label: Column 1
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  pcredits2:
    label: Column 2
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  pcredits3:
    label: Column 3
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  pcredits4:
    label: Column 4
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
    width: 1/2
  headlineInfosSecondary:
    label: Secondary Infos
    type: headline
  subtitle:
    label: Subtitle
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
  text:
    label: Text
    type:  textarea
    buttons:
      - page
      - link
      - italic
    width: 1/2
  additionaltext:
    label: Additional Text
    type:  textarea
    buttons:
      - page
      - link
      - italic
    width: 1/2
  headlineCreditsTeam:
    label: Team Credits
    type: headline
  team:
    label: Team
    type:  textarea
    buttons:
      - bold
      - page
      - link
      - italic
  tab2:
    label: Content
    type:  tabs
  medias:
    label: Images
    type: images
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
    columns: 1
    query:
      page: projects
      fetch: children
      value: '{{uid}}'
      text: '{{title}}'
      sort: title