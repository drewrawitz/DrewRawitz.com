//@codekit-prepend 'plugins/_jquery-embedagram.pack.js';
//@codekit-prepend 'plugins/_jquery.lightbox-0.5.pack.js';
//@codekit-prepend 'plugins/_jquery.nav_scroll.js';

$(document).ready(function() {
    // Instagram Feed
	$('.instagram-feed').embedagram({
    	instagram_id: '37768681',
    	limit: 6,
    	thumb_width: 60,
        link_type: 'img',
        success: function (){ 
            $('.instagram-feed a').lightBox({
                imageLoading: 'assets/images/lightbox/lightbox-ico-loading.gif',
                imageBtnClose: 'assets/images/lightbox/lightbox-btn-close.gif',
                imageBtnPrev: 'assets/images/lightbox/lightbox-btn-prev.gif',
                imageBtnNext: 'assets/images/lightbox/lightbox-btn-next.gif'
            })
        }
    });
});