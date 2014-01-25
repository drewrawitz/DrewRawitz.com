// Cache selectors
var lastId,
          topMenu = $("nav"),
          topMenuHeight = topMenu.outerHeight() + 0,
          // All list items
          menuItems = topMenu.find("a"),
          //menuItems = $('[data-target]'),

          // Anchors corresponding to menu items
          scrollItems = menuItems.map(function(){
                        var item = $($(this).attr("data-target"));
                        if (item.length) {
                                return item;
                        }
          });
          
          menuItems = menuItems.add('.main-content a[data-target]');
          menuItems = menuItems.add('.sidebar a[data-target]');

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e) {
        var href = $(this).attr("data-target"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - (topMenu.outerHeight() - 150) + 1;
        $('html, body').stop().animate({
          scrollTop: offsetTop
        }, 800);
        e.preventDefault();
});


// Bind to scroll
$(window).scroll(function(){
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight + 1;

        // Get id of current scroll item
        var cur = scrollItems.map(function(){
                if ($(this).offset().top < fromTop) {
                        return this;
                }
        });
        // Get the id of the current element
        cur = cur[cur.length-1];
        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                        .parent().removeClass("active")
                        .end().filter("[data-target=#"+id+"]").parent().addClass("active");
        }
});