function advCarModel_Complete(data, textStatus, jqXHR) {
 if ($('#carmodel_>option').length <= 1) {
  $('#carmodelman').show();
  $('#carmodel_').hide();
 } else {
  $('#carmodelman').hide();
  $('#carmodel_').show();
 }

 if (!$('#carbrand_').val()) {
  $('#carmodelman').hide();
  $('#carmodel_').hide();
 }
}

BrandForModel('carbrand_', 'carmodel_', advCarModel_Complete);

$('#vehicleimgs').change(function() {
 var fileInputName = $(this).attr('name');
 $.ajax({
  'type': 'POST',
  'url': '<?= SiteURL?>',
  'async': true,
  'contentType': 'text/plain',
  'dataType': 'text',
  'data': {
   'advertisements/async_img_uploads': '',
   fileInputName: $(this).val()},
  /**
   * Description of success (data, textStatus, jqXHR)
   * any type : data
   * string : textStatus
   * jqXHR : jqXHR
   */
  'success': function(data, textStatus, jqXHR) {
   $('#uploadedImages').html(data);
  },

//  'complete': '',

  /**
   * Description of error (data, textStatus, jqXHR)
   * jqXHR: jqXHR
   * string : textStatus
   * String: errorThrown
   */
  'error': function(jqXHR, textStatus, errorThrown) {
   alert(textStatus);
  }});
});

$('#newadvform').submit(function() {
 $('<div></div>').append($(this)).css({
  'position': 'fixed',
  'top': '10%',
  'left': '10%'
 }).text($(this).serialize());
 $(this).preventDefault();
});

hiddenToButton('.adv-hidden-list');