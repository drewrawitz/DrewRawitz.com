$(document).ready(function() {

    $.getJSON('instagram/instagram.json', function(data) {
      var currentPage = 1;
      var showPerPage = 6;
      var numberOfItems = data.length;
      var totalPages = Math.round(numberOfItems / showPerPage) + 1;
      var nextBtn = $('.ig-next');
      var prevBtn = $('.ig-back');

      function gotoPage(page) {
        var html = '';
        var offset = (page - 1) * showPerPage;
        var dat = _.slice(data, offset, offset + showPerPage);

        _.forEach(dat, function(n, key) {
          html += '<li><a href="instagram/images/full/'+n.base+'" class="fancybox" rel="lightbox" title="'+n.description+'"><img src="instagram/images/thumbs/'+n.base+'" width="60" height="60"></a></li>';
        });

        $('.instagram-feed').html(html);
        $('.currentPage').html(page);
      }

      $('.totalPages').html(totalPages);
      gotoPage(1);

      // prev page
      prevBtn.click(function(e) {
        e.preventDefault();

        if (currentPage > 1) {
          currentPage -= 1;
          gotoPage(currentPage);

          if (currentPage <= 1 && !prevBtn.hasClass('disabled')) {
            prevBtn.addClass('disabled');
          }

          if (currentPage <= totalPages && nextBtn.hasClass('disabled')) {
            nextBtn.removeClass('disabled');
          }
        }
      });

      // next page
      nextBtn.click(function(e) {
        e.preventDefault();

        if (currentPage <= totalPages) {
          currentPage += 1;
          gotoPage(currentPage);

          // if we are past page 1, remove the disabled class on the previous button
          if (currentPage > 1 && prevBtn.hasClass('disabled')) {
            prevBtn.removeClass('disabled');
          }

          if (currentPage >= totalPages && !nextBtn.hasClass('disabled')) {
            nextBtn.addClass('disabled');
          }
        }
      });

    });

    // Initialize Fancybox
    $(".fancybox").fancybox({
      openEffect  : 'elastic',
      closeEffect : 'elastic'
    });
});
