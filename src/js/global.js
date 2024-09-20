(function ($) {

    $(window).scroll(function () {
        if($(window).scrollTop() > 10) {
            $('.navbar').addClass('scrolled');
            $('.navbar').removeClass('at-top');
        } else {
            $('.navbar').removeClass('scrolled');
            $('.navbar').addClass('at-top');
        }
    });

    function autoHeight() {
        $('#content').css('min-height', 0);
        $('#content').css('min-height',
            $(document).height() - $('.navbar-container').height() - $('.site-footer').height()
        );
        $('body.with-padding').css('padding-top', $('.navbar').outerHeight());
        $('.navbar').css('top', $('#wpadminbar').outerHeight())
    }

    $(document).ready(autoHeight);
    $(document).ready(menuMargin);
    $(window).resize(autoHeight);
    $(window).resize(menuMargin);

    function menuMargin() {
        $('.menu-overlay').css({ 'top': $('.navbar').outerHeight() + 'px'});
    }

    $('.navbar-toggler').click(function(){
        $('.site').toggleClass('mobile-menu-open');
    })

    function isDesktop() {
        return $(window).width() >= 992
    }

    $('#primary-menu .dropdown').mouseenter(hoverOpenMenu);
    $('#primary-menu .dropdown').mouseleave(hoverCloseMenu);
    $('#primary-menu .dropdown-toggle').focusin(focusOpenMenu);
    $('#primary-menu .dropdown-toggle').click(toggleMenu);
    $('#primary-menu .dropdown .dropdown-item').focusin(childOpenMenu);
    $('#primary-menu .dropdown li:last-child .dropdown-item').focusout(childCloseMenu);

    let hoverTimeout;
    let activeMenu;
    function hoverOpenMenu() {
        const thisMenu = $(this).children(".dropdown-menu");
        if (thisMenu !== activeMenu && activeMenu){
            closeMenu(activeMenu);
        }
        clearTimeout( hoverTimeout );
        openMenu(thisMenu);
        activeMenu = thisMenu;
    }

    function hoverCloseMenu() {
        const menu = $(this).children(".dropdown-menu")
        hoverTimeout = setTimeout(function(){
            closeMenu(menu);
            activeMenu = null;
        }, 500);
    }

    function focusOpenMenu() {
        if(activeMenu){
            closeMenu(activeMenu);
        }
        openMenu($(this).siblings(".dropdown-menu"))
    }

    function childOpenMenu() {
        openMenu($(this).closest(".dropdown-menu"));
    }

    function childCloseMenu() {
        closeMenu($(this).closest(".dropdown-menu"));
    }

    function toggleMenu() {
        var dropdown = $(this).siblings(".dropdown-menu");
        if(menuIsOpen(dropdown)){
            closeMenu(dropdown)
        } else {
            openMenu(dropdown)
        }
        if (isDesktop()){
            $('.menu-overlay').addClass('menu-open');
        }
    }

    function openMenu(dropdown) {
        if(isDesktop() ){
            dropdown.addClass('show');
            dropdown.parent().addClass("open");
            $('.menu-overlay').css({ 'height': dropdown.outerHeight() * 1.05 + 'px' });
            $('.menu-overlay').addClass('menu-open');
        }
    }

    function closeMenu(dropdown) {
        $('#page').removeClass('mobile-menu');
        $('.navbar').removeClass('mobile-nav');
        $('.navbar').find('.container').removeClass('.mobile-container');
        if(isDesktop() ){
            dropdown.removeClass('show');
            dropdown.parent().removeClass("open");
            $('.menu-overlay').removeClass('menu-open');
        }
    }

    function menuIsOpen(dropdown) {
        if(dropdown.hasClass('show') ){
            return true;
        } else {
            return false;
        }
    }

    $('.menu-overlay').click(function () {
        $('.dropdown-toggle.nav-link').each(function () {
            $(this).removeClass('activated');
        });
        $(this).removeClass('menu-open');
    });

    $('.interfolio-search-button').click(toggleSeachOverlay);
    $('.search-overlay-exit').click(toggleSeachOverlay);

    function toggleSeachOverlay() {
        $('.search-overlay-container').toggleClass('visible');
        $('.site').toggleClass('search-overlay-open');
    }

    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)')
                          .exec(window.location.search);
    
        return (results !== null) ? results[1] || 0 : false;
    }

    let urlSchemas = [
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_adtype'
    ];

    if (typeof MktoForms2 !== 'undefined') {
        MktoForms2.whenReady(populateForm);
    }else {
        $.each(urlSchemas, function(idx, value) {
            const val = $.urlParam(value);
            if(val) {
                Cookies.set(value, val, {
                    expires: 1
                });
            }

            console.log(value, val);

            const inputVal = Cookies.get(value);

            if (value == 'utm_source' && !inputVal) {
                Cookies.set(value, 'website', {
                    expires: 1
                });
            }
        });
    }

    function populateForm(form){
        const vals = {};
        $.each(marketoFieldsToPopulate, function(idx, field){
            const val = $.urlParam(field.utm_parameter);
            if(val){
                Cookies.set(field.utm_parameter, val, {
                    expires: 1
                });
            }

            const inputVal = Cookies.get(field.utm_parameter);

            if (field.utm_parameter == 'utm_source' && !inputVal) {
                console.log('test');
                Cookies.set(field.utm_parameter, 'website', {
                    expires: 1
                });
                vals[field.marketo_field_name] = 'website';
            }

            if (inputVal){
                vals[field.marketo_field_name] = inputVal;
            }
        });
        form.setValues(vals);
    }
})(jQuery);
