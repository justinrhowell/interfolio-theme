( function( $ ) {
    $('.menu-item-has-children').click(function(){
        var newClass = $(this).hasClass('expanded') ? 'collapsed' : 'expanded';
        var oldClass = newClass == 'expanded' ? 'collapsed' : 'expanded';
        $(this).addClass(newClass).removeClass(oldClass);
    })
} )( jQuery );
