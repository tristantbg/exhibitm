<?php 

return function($page, $textarea) {

  $form = new Kirby\Panel\Form(array(
    'text' => array(
      'label'       => 'Quote',
      'type'        => 'text',
      'autofocus'   => 'true',
      'required'    => 'true',
    ),
    'align' => array(
      'label' => 'Align',
      'type'  => 'select',
      'required'    => 'true',
      'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right')
    )
  ));

  $form->data('textarea', 'form-field-' . $textarea);
  $form->style('editor');
  $form->cancel($page);

  return $form;

};