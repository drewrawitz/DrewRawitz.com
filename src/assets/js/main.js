$(document).ready(function() {
    // make an AJAX request to get our feed
    function ajaxRequest() {
      return $.ajax({
          url: 'scripts/instagram/random.php',
          type: 'POST'
      });
    }

    function displayData(data) {
      data.success(function(realData) {
        var html = '';
        jQuery.each( realData, function( i, val ) {
          html += '<li><a href="assets/images/instagram/'+val+'" class="fancybox" rel="lightbox"><img src="assets/images/instagram/thumbs/'+val+'"></a></li>';
        });

        $(html).hide().appendTo(".instagram-feed").fadeIn(1000);
        $('.ig-reload').removeClass('animate-spin');

        $(".fancybox").fancybox({
          openEffect  : 'elastic',
          closeEffect : 'elastic'
        });

      });
    }

    var instagram_feed = ajaxRequest();
    displayData(instagram_feed);

    $('.ig-reload').on('click', function() {
      $(this).addClass('animate-spin');

      $('.instagram-feed').html('');
      displayData(ajaxRequest());
    });
});