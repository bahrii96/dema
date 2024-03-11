(function ($) {
    $(document).ready(function () {
        // When the user scrolls the page, execute myFunction

        $('.grid-image').fancybox({
            buttons: ['zoom', 'slideShow', 'fullScreen', 'thumbs', 'close'],
            loop: true,
        });
        window.onscroll = function () {
            myFunction();
        };
        var header = document.querySelector('header');
        var sticky = header.offsetTop;
        function myFunction() {
            if (window.pageYOffset > 30) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        }

        $('#accordion').accordion({
            header: '> div > h3',
            heightStyle: 'content',
        });

        $('.services-block__item:has(.ui-state-active)').addClass('active');

        $('.services-block__item').on('click', function () {
            $('.services-block__item').removeClass('active');

            if ($(this).find('.ui-state-active').length) {
                $(this).addClass('active');
            }
        });

        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 1.2,
            breakpoints: {
                767: {
                    slidesPerView: 4,
                },
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            autoplay: {
                delay: 5000,
            },
            loop: true,
            speed: 1000,
        });

        var swiper = new Swiper('.portfolio-swiper ', {
            slidesPerView: 2,

            breakpoints: {
                767: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 6,
                },
            },
            navigation: {
                nextEl: '.portfolio-swiper-next',
                prevEl: '.portfolio-swiper-prev',
            },
            autoplay: {
                delay: 5000,
            },
            loop: true,
            speed: 1000,
        });
        var swiper = new Swiper('.history-block__swiper', {
            slidesPerView: 1,
            speed: 1000,
            navigation: {
                nextEl: '.history-swiper-next',
                prevEl: '.history-swiper-prev',
            },
            allowTouchMove: false,
        });

        $(document).on('touchstart', function (e) {
            if (!$(e.target).closest('nav').length && !$(e.target).hasClass('menu-toggle')) {
                $('.header .menu-toggle, .header nav').removeClass('is-active');
                $('body').removeClass('is-active');
            }
        });

        $('.header .menu-toggle, .header nav .close').click(function (e) {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        $('.header nav ul li.menu-item-has-children .icon').click(function () {
            const listItem = $(this).parent('li');
            $(this).toggleClass('rotate');
            listItem.toggleClass('is-active');
            if ($(this).hasClass('rotate')) {
                $(this).next().addClass('toggled');
            } else {
                $(this).next().removeClass('toggled');
            }
        });
        $('.header nav ul li.menu-item a').click(function () {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        $('.header .side-bar-toggle').click(function (e) {
            $('body').addClass('fixed');
            $('body .side-bar').addClass('show');
        });

        $('body .side-bar .close-sidebar').click(function (e) {
            $('body').removeClass('fixed');
            $('body .side-bar').removeClass('show');
        });

        if ($('#counter').length) {
            var counted = 0;
            $(window).scroll(function () {
                var oTop = $('#counter').offset().top - window.innerHeight;
                if (counted == 0 && $(window).scrollTop() > oTop) {
                    $('.counter-value').each(function () {
                        var $this = $(this),
                            countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text(),
                        }).animate(
                            {
                                countNum: countTo,
                            },

                            {
                                duration: 700,
                                easing: 'swing',
                                step: function () {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function () {
                                    $this.text(this.countNum);
                                    //alert('finished');
                                },
                            },
                        );
                    });
                    counted = 1;
                }
            });
        }
        $(function () {
            $('#tabs').tabs();
        });
    });
})(jQuery);

document.addEventListener(
    'wpcf7mailsent',
    function (event) {
        var fancyboxInstance = $.fancybox.getInstance();

        if (fancyboxInstance) {
            fancyboxInstance.close(); // Закриваємо відкритий попап
            $.fancybox.open({
                src: '#popup-answer',
                type: 'inline',
                opts: {
                    afterClose: function () {},
                },
            });
        } else {
            window.location.href = '/success';
        }
    },
    false,
);







