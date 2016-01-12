/*------------------------------------------------------------------ Scroll To*/
jQuery.fn.extend(
        {
            scrollTo: function (speed, easing)
            {
                return this.each(function ()
                {
                    var targetOffset = $(this).offset().top;
                    $('html,body').animate({scrollTop: targetOffset}, speed, easing);
                });
            }
        });
$(document).ready(function () {
    $(function () {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 200, // distance to the element when triggering the animation (default is 0)
            mobile: false        // trigger animations on mobile devices (true is default)
        });
        wow.init();
    });

    $('#navigation li button.navbar-btn').click(function () {
        location.href = $(this).data('url');
    });

    // Configure/customize these variables.
    var showChar = 16;  // How many characters are shown by default
    var ellipsestext = "...";

    $('.more').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + ellipsestext;

            $(this).html(html);
        }

    });

    $('#img-back-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
    $('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#sidr'
    });

    $('a').on('click', function () {
        if ($(this).data('goto') != '') {
            var goto = $(this).data('goto');
            $('#' + goto).scrollTo(500);
        }
    });
});

$(function () {
    $('.service-info article.module').heightLine();

    $('p.footer-his').heightLine();
});

$(function () {
    if ($('#myCarousel').length > 0) {
        $('.carousel').carousel({
            interval: 4000
        });

        $('#myCarousel').on('slide.bs.carousel', function (event) {
            // do something…
            img_src = $(event.relatedTarget.innerHTML).attr('data-image-src');
            //alert(img_src);

            $("img.parallax-slider").attr('src', img_src);
        });
    }
});

/*  Paralax slider */
$(function () {
    var setBanerHeight = function() {
        var headerHeight = $('#navigation').height();
        $('#myCarousel')
            .height($(window).height() - headerHeight)
            .find('.carousel-inner').height($(window).height() - headerHeight)
            .find('.item').each(function() {
                $(this)
                    .height($(window).height() - headerHeight)
                    .find('.parallax-window').height($(window).height() - headerHeight);
            });
    }

    $( window ).resize(function() {
        setBanerHeight();
    });

    setBanerHeight();
});

/* fix top menu */
$(function () {
    var nav = $('#navigation');
    var lastScrollTop = 0;
    nav.removeClass('navbar-fixed-top');
    $(window).scroll(function (e) {
        var scroll = $(this).scrollTop();
        if (scroll > nav.height()) {
            if (!nav.hasClass('navbar-fixed-top')) {
                nav.addClass('navbar-fixed-top');
            }
            if (scroll > lastScrollTop) {
                nav.addClass('invisible').removeClass('visible');
            } else {
                nav.removeClass('invisible').addClass('visible');
            }
        } else {
            if (nav.hasClass('navbar-fixed-top')) {
                if (scroll == 0) {
                    nav.removeClass('navbar-fixed-top');
                }
            }
        }
        lastScrollTop = scroll;
    });
});
