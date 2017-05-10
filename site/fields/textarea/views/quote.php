<div class="modal-content">
  <?php echo $form ?>
</div>

<script>

(function() {

  var form      = $('.modal .form');
  var textarea  = $('#' + form.data('textarea'));
  var selection = textarea.getSelection();
  var textField  = form.find('input[name=text]');
  alignField = form.find('select[name=align]');
    
  if(selection.length) {
    textField.val(selection);
  }

  form.on('submit', function() {

    var text  = textField.val();
    var align = alignField.val();
    
    console.log(align);

    // make sure not to add invalid parenthesis
    text = text.replace('(', '[');
    text = text.replace(')', ']');
    
    if(form.data('kirbytext')) {
      var tag = '(quote: ' + text + ' align: ' + align + ')';
    } else {
      var tag = '[' + text + '](' + align + ')';
    }

    textarea.insertAtCursor(tag);
    app.modal.close();

  });

})();

</script>