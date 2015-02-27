(function($) {

    $('.hmatch').matchHeight();

    $('#accordion  a').on('click', function(e){
        e.preventDefault();
        var target = $(this).attr('href');
        var content = $(target);
        if( $(this).hasClass('open') ){
            $(this).removeClass('open');
            content.velocity("slideUp");
        } else {
            $(this).addClass('open');
            content.velocity("slideDown");
        }
    });

    $('#features .bgwrap').on('hover', '.link-cover', function(e){
        $(e.delegateTarget).next('.one-half').find('.button').toggleClass('hover');
    });

    $('#features .one-half').on('hover', '.link-cover', function(e){
        $(e.delegateTarget).find('.button').toggleClass('hover');
    });

    /*
    $('#callouts').on('click', 'a', function(e){
        var link = $(this).attr('href');
        if ( link.match(/watch\?v=([a-zA-Z0-9\-_]+)/) ) {
			e.preventDefault();
            $(this).magnificPopup({
              type:'iframe',
            }).trigger('click');
        }
    });
    */

})(jQuery);