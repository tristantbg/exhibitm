/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    filters = {},
    filterValue = "",
    isMobile = false,
    $root = '/exhibitionmagazine';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {});
            $(document).ready(function($) {
                $body = $('body');
                $theme = $("#theme");
                $media = $("#media");
                $author = $("#author");
                // History.Adapter.bind(window, 'statechange', function() {
                //     var State = History.getState();
                //     console.log(State);
                //     var content = State.data;
                //     if (content.type == 'project') {
                //         $body.addClass('project loading');
                //         app.loadContent(State.url + '/ajax', slidecontainer);
                //     }
                // });
                $(document).keyup(function(e) {
                    //esc
                    if (e.keyCode === 27) app.goIndex();
                    //left
                    if (e.keyCode === 37 && $slider) app.goPrev($slider);
                    //right
                    if (e.keyCode === 39 && $slider) app.goNext($slider);
                });
                app.initSelector();
                app.sectionsMagnet();
                $(window).load(function() {
                    $(".loader").fadeOut("fast", function() {
                        app.loopTitles();
                    });
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770 || Modernizr.touch) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    //location.reload();
                    isMobile = false;
                }
            }
        },
        loopTitles: function() {
            if (typeof loopTitles1 != 'undefined' && typeof loopTitles2 != 'undefined') {
                var $text1 = $('#selectorTitle h1'),
                    $text2 = $('#selectorSubmit h1'),
                    copy1 = [],
                    copy2 = [],
                    delay = 2; //seconds
                function loop() {
                    if (copy1.length === 0) {
                        copy1 = loopTitles1.slice();
                    }
                    if (copy2.length === 0) {
                        copy2 = loopTitles2.slice();
                    }
                    $text1.html(copy1.splice(Math.random() * copy1.length, 1)[0]);
                    $text2.html(copy2.splice(Math.random() * copy2.length, 1)[0]);
                }
                setInterval(loop, delay * 1E3);
            }
        },
        initSelector: function() {
            app.updateFilters();
            $('#themeSelector').change(function() {
                app.updateFilters();
            });
            $('#mediaSelector').change(function() {
                app.updateFilters();
            });
            $('#authorSelector').change(function() {
                app.updateFilters();
            });
            $body.on('click', '.selector:not(".is-selecting") li', function(event) {
                event.preventDefault();
                app.select($(this));
            });
            $body.on('click', '.selector.is-selecting', function(event) {
                event.preventDefault();
                if ($(this).is($theme)) {
                    app.unselect($('.selector'));
                }
                app.unselect($(this));
            });
            $body.on('click', '#selectorSubmit', function(event) {
                event.preventDefault();
                if (filters.theme == '' && filters.media == '' && filters.author == '') {
                    return;
                } else if (filters.theme == '' && filters.media == '' && filters.author != '') {
                    window.location.href = $root + "/projects/" + filters.author;
                } else if (filters.theme != '' && filters.media != '' && filters.author != '') {
                    $.ajax({
                        url: $root + "/api/random" + filterValue,
                        dataType: "json",
                        success: function(data) {
                            window.location.href = data.url;
                        }
                    });
                } else {
                    window.location.href = $root + "/projects" + filterValue;
                }
            });
        },
        select: function(el) {
            $parent = el.parent().addClass('is-selecting');
            $parent.find('li').removeClass('selected');
            el.addClass('selected');
            $parent.parent().trigger('change');
        },
        unselect: function(el) {
            el.find('li').removeClass('selected');
            el.find('[default]').addClass('selected');
            el.removeClass('is-selecting').parent().trigger('change');
        },
        updateFilters: function(theme, media, author) {
            filters.theme = $('#themeSelector').find('.selected').data('value');
            filters.media = $('#mediaSelector').find('.selected').data('value');
            filters.author = $('#authorSelector').find('.selected').data('value');
            if (theme) filters.theme = '';
            if (media) filters.media = '';
            if (author) filters.author = '';
            // combine filters
            filterValue = app.concatValues(filters);
            console.log(filterValue);
            app.loadAllSelectors(filterValue);
        },
        loadAllSelectors: function(filter) {
            $.ajax({
                url: $root + "/api/projects" + filter,
                dataType: "json",
                success: function(data) {
                    //themes
                    var newList = $();
                    var uniq = [];
                    $current = $theme.find('.selected').data('value');
                    $theme.children(':not([keep])').remove();
                    $(data).each(function() {
                        if (!isInArray(uniq, this.theme.slug)) {
                            $theme.append($('<li>', {
                                "data-value": this.theme.slug,
                                html: this.theme.title,
                            }));
                            uniq.push(this.theme.slug);
                        }
                    });
                    if (!isInArray(uniq, $current)) {
                        $theme.find('[default]').addClass('selected');
                    } else {
                        $theme.children('[data-value="' + $current + '"]').addClass('selected');
                    }
                    //medias
                    newList = $();
                    uniq = [];
                    $current = $media.find('.selected').data('value');
                    $media.children(':not([keep])').remove();
                    $(data).each(function() {
                        if (!isInArray(uniq, this.media.slug)) {
                            $media.append($('<li>', {
                                "data-value": this.media.slug,
                                html: this.media.title,
                            }));
                            uniq.push(this.media.slug);
                        }
                    });
                    if (!isInArray(uniq, $current)) {
                        $media.find('[default]').addClass('selected');
                    } else {
                        $media.children('[data-value="' + $current + '"]').addClass('selected');
                    }
                    //authors
                    newList = $();
                    uniq = [];
                    $current = $author.find('.selected').data('value');
                    $author.children(':not([keep])').remove();
                    $(data).each(function() {
                        if (!isInArray(uniq, this.author.slug)) {
                            $author.append($('<li>', {
                                "data-value": this.author.slug,
                                html: this.author.title,
                            }));
                            uniq.push(this.author.slug);
                        }
                    });
                    if (!isInArray(uniq, $current)) {
                        $author.find('[default]').addClass('selected');
                    } else {
                        $author.children('[data-value="' + $current + '"]').addClass('selected');
                    }
                }
            });
        },
        sectionsMagnet: function() {
            $('#page-content.magnet').fullpage({
                scrollingSpeed: 700,
                autoScrolling: true,
                scrollBar: false,
                easing: 'easeInOutCubic',
                easingcss3: 'ease',
                loopBottom: false,
                loopTop: false,
                loopHorizontal: true,
                continuousVertical: false,
                continuousHorizontal: false,
                scrollOverflow: false,
                scrollOverflowReset: false,
                scrollOverflowOptions: null,
                touchSensitivity: 15,
                normalScrollElementTouchThreshold: 5,
                bigSectionsDestination: null,
                controlArrows: false,
                verticalCentered: false,
                sectionSelector: '.section-magnet',
            });
        },
        goIndex: function() {
            History.pushState({
                type: 'index'
            }, $sitetitle, window.location.origin + $root);
        },
        // flatten object by concatting values
        concatValues: function(obj) {
            var value = '';
            for (var prop in obj) {
                if (obj[prop]) {
                    value += '/' + prop + ':' + obj[prop];
                }
            }
            return value;
        },
        loadContent: function(url, target) {
            $.ajax({
                url: url,
                success: function(data) {
                    $(target).html(data);
                }
            });
        },
        deferImages: function() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i = 0; i < imgDefer.length; i++) {
                if (imgDefer[i].getAttribute('data-src')) {
                    imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                }
            }
        }
    };
    app.init();
});

function uniq(a) {
    var prims = {
            "boolean": {},
            "number": {},
            "string": {}
        },
        objs = [];
    return a.filter(function(item) {
        var type = typeof item;
        if (type in prims) return prims[type].hasOwnProperty(item) ? false : (prims[type][item] = true);
        else return objs.indexOf(item) >= 0 ? false : objs.push(item);
    });
}

function isInArray(arr, obj) {
    return (arr.indexOf(obj) != -1);
}