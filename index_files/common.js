$(function () {
    ChPages.Initialize();
    $('.js-gototop').click(function (event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 500);
    });
    var tabs = $('.js-tabs'),
        tab = tabs.find('.js-tab').children(),
        tabContent = tabs.find('.js-tabcontent').children(),
        activeClass = 'is-active',
        search = $('.search'),
        searchShow = $('.js-search-show'),
        searchHide = $('.js-search-hide'),
        sidebar = $('.l-sidebar__inner'),
        wrapper = $('.main-wrap');

    tabContent.not(':first-child').hide();
    tab.click(function (event) {
        var activeTabIndex = $(this).index();
        tab.removeClass(activeClass);
        $(this).addClass(activeClass);
        tabContent.hide();
        tabContent.eq(activeTabIndex).show();
        return false;
    });
    searchShow.click(function (event) {
        search.slideToggle();
        searchShow.toggleClass('is-inactive');
        return false;
    });
    searchHide.click(function (event) {
        search.slideUp();
        searchShow.removeClass('is-inactive');
        return false;
    });
    $('.gallery__pager .slide').click(function () {
        var index = $(this).parents('.gallery').find('.gallery__pager').data('cycle.API').getSlideIndex(this);
        console.log(index);
        $(this).parents('.gallery').find('.cycle-slideshow').cycle('goto', index);
    });
    var lastNewsBlock = $('.last-news-mk');
    lastNewsBlock.timer({
        delay: 60000, repeat: true, autostart: true, callback: function (index) {
            var counterEl = lastNewsBlock.find('.news__counter');
            var lastNewsId = lastNewsBlock.find('li').data('ai');
            var lastNewsIds = lastNewsBlock.find('li').slice(0, 3).map(function () {
                return $(this).data('ai');
            }).get().join(';');
            if (lastNewsIds) {
                $.ajax({url: '/lenta/last-news-from-news/' + lastNewsIds + '/'}).done(function (responseText) {
                    if (responseText.charAt(0) == '0') {
                        var resParts = responseText.split('<|>');
                        var freshNewsCount = resParts[1];
                        var freshNews = resParts[2];
                        if (freshNews == 0) {
                            $(counterEl).html('');
                        } else if (freshNewsCount && freshNews) {
                            $(counterEl).html(freshNewsCount).fadeIn('slow');
                            $('.last-news-mk .uploaded-news-mk').html(freshNews);
                        }
                    }
                });
            }
        }
    });
    $('.last-news-mk .news__counter, .last-news-mk h3').click(function (event) {
        lastNewsBlock.find('.uploaded-news-mk').children().hide().prependTo('.last-news-mk ul').fadeIn('slow');
        lastNewsBlock.find('.uploaded-news-mk').empty();
        lastNewsBlock.find('.news__counter').empty().hide();
    });
    var mainWrap = $('.main-wrap');
    mainWrap.find('.lenta-load-page-mk').click(function (event) {
        event.preventDefault();
        var lastNewsId = mainWrap.find('.news_latest li').last().data('ai');
        if (lastNewsId) {
            $.ajax({
                url: '/lenta/prev-page-from-news/' + lastNewsId + '/',
                data: {'c': 'ajlenta', 'i': lastNewsId, 'c2': 'ajlenta'}
            }).done(function (responseText) {
                if (responseText.charAt(0) == '0') {
                    var resParts = responseText.split('<|>');
                    var newsCount = resParts[1];
                    var news = resParts[2];
                    if (newsCount > 0 && news) {
                        mainWrap.find('.uploaded-news-mk').html(news);
                        mainWrap.find('.uploaded-news-mk').children().hide().insertBefore('.lenta-pagination-mk').fadeIn('slow');
                    }
                }
            });
        }
    });
    $(document).scroll(function (event) {

        //return;

        b = $('body');
        if ($(document).scrollTop() > 400) {
            b.addClass('can-gototop')
        } else {
            b.removeClass('can-gototop')
        }

        if ($(window).width() < 1150) {
            return;
        }

        var sidebarBottomPosition = wrapper.offset().top + sidebar.height(),
            // wrapperTopPosition = wrapper.offset().top,
            wrapperBottomPosition = wrapper.offset().top + wrapper.height();

        if (($('.l-main').height() - 15) > sidebar.height()) {
            var targetTopPosition = $(document).scrollTop() + $(window).height();

            if (targetTopPosition >= sidebarBottomPosition) {
                sidebar.css({position: 'fixed', top: 'auto', bottom: '0'});
            } else {
                sidebar.css({position: 'static', top: 'auto', bottom: 'auto'});
            }

            if (targetTopPosition >= wrapperBottomPosition) {
                sidebar.css({position: 'absolute', top: 'auto', bottom: '0'});
            }
        }



        // if (wrapper.parents('.l_article').length !== 0 && $(window).width() < 1150 || $('.l-main').height() < sidebar.height()) {
        //     return false;
        // }
        // if (wrapper.children('.l-top').length !== 0 && $(window).width() < 1150) {
        //     sidebarBottomPosition = wrapper.offset().top + $('.l-top').height() + 50 + sidebar.height(), wrapperTopPosition = wrapper.offset().top + $('.l-top').height() + 50;
        // }
        //
        // if (sidebar.height() < $(window).height()) {
        //     var targetTopPosition = $(document).scrollTop() + 20,
        //         targetBottomPosition = $(document).scrollTop() + sidebar.height() + 20;
        //
        //     console.log('123');
        //
        //     if (targetTopPosition >= wrapperTopPosition) {
        //         sidebar.css({position: 'fixed', top: '20px', bottom: 'auto'});
        //     } else {
        //         sidebar.css({position: 'static', top: 'auto', bottom: 'auto'});
        //     }
        //
        //     if (targetBottomPosition >= wrapperBottomPosition) {
        //         sidebar.css({position: 'absolute', top: 'auto', bottom: '0'});
        //     }
        // } else {
        //
        //     console.log('321');
        //
        //     var targetTopPosition = $(document).scrollTop() + $(window).height();
        //
        //     if (targetTopPosition >= sidebarBottomPosition) {
        //         sidebar.css({position: 'fixed', top: 'auto', bottom: '0'});
        //     } else {
        //         sidebar.css({position: 'static', top: 'auto', bottom: 'auto'});
        //     }
        //
        //     if (targetTopPosition >= wrapperBottomPosition) {
        //         sidebar.css({position: 'absolute', top: 'auto', bottom: '0'});
        //         console.log('absolute');
        //     }
        //
        // }
    });
});