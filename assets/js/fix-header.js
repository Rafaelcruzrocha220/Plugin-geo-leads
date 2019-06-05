// Bug header fixed, with top bar.

(function($) {
    
    navHeader = $('.geo-message');
    isTop = navHeader.css("top");

    if(isTop == "0px"){
        height = navHeader.outerHeight();
        $('html').css('margin-top',height);
    }

})( jQuery );

