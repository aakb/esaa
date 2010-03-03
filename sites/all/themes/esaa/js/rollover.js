/**
 * @author kasperskov-nielsen openUsource.com
 */
$(document).ready(function(){
	var imgsrc = '';
	
$(".view-sportsgrene img").hover(
	  function() {
	  	imgsrc = $(this).attr('src');
		roimgsrc = imgsrc.replace('.png','-rollover.png')
//		alert(imgsrc);	  	
//    	$(this).attr('src','/sites/default/files/oevrige-rollover.png');
    	$(this).attr('src',roimgsrc);
  	}, 
  	function() {
		imgsrc.replace('-rollover.png','.png')	
    	$(this).attr('src',imgsrc);
  	}
	);
});
