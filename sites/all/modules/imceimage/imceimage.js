/**
 * $Id: imceimage.js,v 1.1 2008/04/09 18:59:57 panis Exp $
 * imceimage javascript handler functions supporting the imceimage module
 */
var imceImage = {};

imceImage.initiate = function() {
}

imceImage.open = function (url, field) {
   imceImage.target = field;
   url = url + '|imceload@imceImage_load';
   imceImage.pop = window.open(url, '', 'width=760,height=560,resizable=1');
   imceImage.pop.focus();
}

imceImage_load = function (win) {
  win.imce.setSendTo(Drupal.t('Add image to @app', {'@app': Drupal.t('imceimage')}), imceImage.insert);
}

imceImage.insert = function (file, win) {
	fld = imceImage.target;
	var img = '#imceimagearea-' + fld;
	$(img).attr('src', file.url);
	$(img).attr('width', file.width);
	$(img).attr('height', file.height);

	/* form elements here. */
	$('#imceimagepath-' + fld).val(file.url);
	$('#imceimagewidth-' + fld).val(file.width);
	$('#imceimageheight-' + fld).val(file.height);
	win.close();  
}


imceImage.remove = function(fld) {
	$('#imceimagepath-' + fld).val('');
	$('#imceimagewidth-' + fld).val(0);
	$('#imceimageheight-' + fld).val(0);
	$('#imceimagearea-' + fld).attr('src', 'blank.jpg');
}

