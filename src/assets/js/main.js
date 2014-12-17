$(document).ready(function() {
    function shuffle(o){ //v1.0
      for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
      return o;
    };

    function getRandomPhotos() {
      $.getJSON( "instagram.json", function( data ) {
        var items = [];
        var html = '';

        $.each( data, function( key, val ) {
          items.push(val);
        });

        items = shuffle(items);
        items = items.slice(0,6);

        $.each( items, function( key, val ) {
          html += '<li><a href="assets/images/instagram/'+val.base_img+'" class="fancybox" rel="lightbox" title="'+val.description+'"><img src="assets/images/instagram/thumbs/'+val.base_img+'"></a></li>';
        });

        $(html).hide().appendTo(".instagram-feed").fadeIn(1000);
        $('.ig-reload').removeClass('animate-spin');

        $(".fancybox").fancybox({
          openEffect  : 'elastic',
          closeEffect : 'elastic'
        });
      });
    }

    getRandomPhotos();

    $('.ig-reload').on('click', function() {
      $(this).addClass('animate-spin');

      $('.instagram-feed').html('');
      getRandomPhotos();
    });
});