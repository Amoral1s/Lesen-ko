jQuery(document).ready(function ($) {

    ///ASIDE MOBILE MENU
    let $main_menu = $('#main_menu_mobile');
    if ($main_menu.length > 0 && $main_menu.mmenu) {
        $main_menu.show().mmenu({
            extensions: ['multiline', 'pagedim-black', 'fx-menu-slide', 'shadow-page'],
            navbar: {
                title: 'Меню'
            }
        });
        let $close_button = $('<a class="mm-btn mm-btn_close mm-navbar__btn" href="#mm-0" aria-owns="page"><span class="mm-sronly">Закрыть меню</span></a>').on('click', function (e) {
            e.preventDefault();
            // $('.mm-wrapper__blocker.mm-slideout').trigger('click tap touch');
        });
        $main_menu.find('.mm-navbar').append($close_button);
    }

    ///SLIDER DOT
    setTimeout(function () {
        let $slide_slider_dotted = $('.slick-dotted');
        if ($slide_slider_dotted.length > 0) {
            if ($slide_slider_dotted.find('.slick-slide').length < 2) {
                $('.slick-dots').hide();
            }
        }
    }, 1000);

});