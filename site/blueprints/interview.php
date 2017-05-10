<?php if(!defined('KIRBY')) exit ?>

title: Interview
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
  interview:
    label: Interview
    type: builder
    fieldsets:
      interviewsection:
        label: Question/Answer
        fields:
          question:
            label: Question
            type: text
          answer:
            label: Answer
            type: textarea
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