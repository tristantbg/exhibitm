/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    mobileWidth = 900,
    $json = {},
    $selectSliders = [],
    firstSelectInit = true,
    callToAction = false,
    filters = {},
    filterValue = "",
    isMobile,
    $root = '/exhibitionmagazine';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {
                app.sizeSet();
            });
            $(document).ready(function($) {
                $body = $('body');
                $theme = $("#theme");
                $media = $("#media");
                $author = $("#author");
                $selectors = $('.selector');
                $infosOverlay = $("#infos-overlay");
                app.sizeSet();
                app.introCheck();
                // History.Adapter.bind(window, 'statechange', function() {
                //     var State = History.getState();
                //     console.log(State);
                //     var content = State.data;
                //     if (content.type == 'project') {
                //         $body.addClass('project loading');
                //         app.loadContent(State.url + '/ajax', slidecontainer);
                //     }
                // });
                $body.on('click', '.interview-section .question', function(event) {
                    event.preventDefault();
                    $(this).parent().toggleClass('open');
                    $(this).next('.answer').slideToggle(300);
                });
                $body.on('click', '[event-target="feed"]', function(event) {
                    event.preventDefault();
                    $.scrollTo(document.getElementById("feed"), 800, {
                        easing: 'easeInOutCubic'
                    });
                });
                $body.on('click', '[event-target="infos"]', function(event) {
                    if ($(event.target).is('[event-target="infos"]')) {
                        event.preventDefault();
                        $infosOverlay.fadeToggle(300);
                    }
                });
                $body.on('tap', '#infos-overlay[event-target="infos"]', function(event) {
                    if (Modernizr.touch && $(event.target).is('[event-target="infos"]')) {
                        event.preventDefault();
                        $infosOverlay.fadeToggle(300);
                    }
                });
                if (!isMobile) {
                    $('.page ul.selector').hover(function() {
                        $body.addClass('opacify');
                    }, function() {
                        $body.removeClass('opacify');
                    });
                    $('body:not(".page") #container').mousemove(function(event) {
                        el = $(event.target);
                        if (el.is('.selector span') || el.is('.selector li') || el.is('.selector')) {
                            parent = el.parents('.selector');
                            if (!parent.hasClass('is-selecting') && parent.hasClass('hover')) {
                                msg = ((event.pageY - height * 0.29) / height) / 50 * 100 - 0.5;
                                parent.css('transform', 'translateY(' + -msg * 100 + '%) translateZ(0)');
                            }
                        } else {
                            app.repositionSelectors();
                        }
                    });
                    $('#smallSelector').mousemove(function(event) {
                        el = $(event.target);
                        if (el.is('.selector span') || el.is('.selector li') || el.is('.selector')) {
                            parent = el.parents('.selector');
                            if (!parent.hasClass('is-selecting') && parent.hasClass('hover')) {
                                msg = event.pageY - 90 - $(window).scrollTop();
                                if (msg < 0) {
                                    msg = 0;
                                }
                                parent.css('transform', 'translateY(' + -msg + 'px) translateZ(0)');
                            }
                        } else {
                            app.repositionSelectors();
                        }
                    });
                    $('ul.selector').hover(function() {
                        $(this).addClass('hover');
                    }, function() {
                        $(this).removeClass('hover');
                    });
                }
                // $('#mainSelector .groupSelector').mouseleave(function(event) {
                //   $(this).find('.selector').css('transform', 'translateY(0)');
                // });
                $(document).keyup(function(e) {
                    //esc
                    // if (e.keyCode === 27) app.goIndex();
                    // //left
                    // if (e.keyCode === 37 && $slider) app.goPrev($slider);
                    // //right
                    // if (e.keyCode === 39 && $slider) app.goNext($slider);
                });
                app.ajaxLoading();
                app.initSelector();
                app.sectionsMagnet();
                $(window).load(function() {
                    setTimeout(function() {
                        $(".loader").fadeOut("fast", function() {
                            $body.addClass('loaded');
                            if (!$("#intro").is(":visible")) {
                                app.callToAction();
                            }
                        });
                    }, 1000);
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (typeof isMobile == "undefined") {
                if (width <= mobileWidth || Modernizr.touch) {
                    isMobile = true;
                } else {
                    isMobile = false;
                }
            }
            if (isMobile && width > mobileWidth || !isMobile && width <= mobileWidth) {
                location.reload();
            }
        },
        introCheck: function() {
            setTimeout(function() {
                if ($("#intro").length > 0 && typeof(Storage) !== "undefined") {
                    console.log("Already shown" + sessionStorage.getItem('introShown'));
                    if (!sessionStorage.getItem('introShown') || sessionStorage.getItem('introShown') === null) {
                        document.getElementById('intro').style.display = 'block';
                        sessionStorage.setItem('introShown', true);
                        $body.on('click', '[event-target="enter"]', function(event) {
                            event.preventDefault();
                            $("#intro").fadeOut(300, app.callToAction);
                        });
                    } else {
                        document.getElementById('intro').style.display = 'none';
                        console.log("Already shown");
                    }
                }
            }, 0);
        },
        callToAction: function() {
            if (!$body.hasClass('page')) {
                delay = 250;
                setTimeout(function() {
                    $('#themeSelector .is-selected').addClass('highlight').delay(delay).queue(function() {
                        $(this).removeClass("highlight").dequeue();
                    });
                    setTimeout(function() {
                        $('#mediaSelector .is-selected').addClass('highlight').delay(delay).queue(function() {
                            $(this).removeClass("highlight").dequeue();
                        });
                    }, delay * 3);
                    setTimeout(function() {
                        $('#authorSelector .is-selected').addClass('highlight').delay(delay).queue(function() {
                            $(this).removeClass("highlight").dequeue();
                        });
                    }, delay * 6);
                    setTimeout(function() {
                        $('#selectorSubmit h2').addClass('is-selected').delay(delay).queue(function() {
                            $(this).removeClass("is-selected").dequeue();
                        });
                    }, delay * 9);
                }, delay);
            }
        },
        repositionSelectors: function() {
            if (!isMobile) {
                $selectors.css('transform', 'translateY(0)');
            }
        },
        loopTitles: function() {
            if (typeof loopTitles1 != 'undefined' && typeof loopTitles2 != 'undefined') {
                var $text1 = $('#selectorTitle h1'),
                    $text2 = $('#selectorSubmit h1'),
                    copy1 = loopTitles1.slice(),
                    copy2 = loopTitles2.slice(),
                    delay = 1.5; //seconds
                //remove first element
                copy1.shift();
                copy2.shift();
                setInterval(loop, delay * 1E3);
            }

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
        },
        initSelector: function() {
            // $('.selector').each(function(index, el) {
            //     $selectSliders[index] = $(this);
            //     $selectSliders[index].flickity({
            //         cellSelector: 'li',
            //         imagesLoaded: false,
            //         setGallerySize: false,
            //         accessibility: true,
            //         wrapAround: true,
            //         prevNextButtons: true,
            //         pageDots: false,
            //         draggable: true
            //     });
            // });
            app.updateFilters();
            if (!isMobile) {
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
            }
            $body.on('click', '#selectorSubmit h2:not(.disabled)', function(event) {
                event.preventDefault();
                if (filters.theme == '' && filters.media == '' && filters.author == '') {
                    window.location.href = $root + "/projects";
                    return;
                } else if (filters.theme == '' && isInArray(['', 'every'], filters.media) && filters.author == 'everyone') {
                    window.location.href = $root + "/everyone";
                    return;
                } else if (isInArray(['', 'every'], filters.theme) && isInArray(['', 'every'], filters.media) && filters.author != '') {
                    window.location.href = $root + "/projects/" + filters.author;
                } else if ($json.length < 2) {
                    window.location.href = $json[0].url;
                }
                // else if (filters.theme != '' && filters.media != '' && filters.author != '') {
                //     $.ajax({
                //         url: $root + "/api/random" + filterValue,
                //         dataType: "json",
                //         success: function(data) {
                //             window.location.href = data.url;
                //         }
                //     });
                // } 
                else {
                    window.location.href = $root + "/projects" + filterValue;
                }
            });
        },
        select: function(el) {
            if (!callToAction) {
                $('#selectorSubmit h2').addClass('is-selected');
                callToAction = false;
            }
            $parent = el.parent().addClass('is-selecting');
            $parent.find('li').removeClass('is-selected');
            el.addClass('is-selected');
            $parent.parent().trigger('change');
            $body.removeClass('opacify');
            app.repositionSelectors();
        },
        unselect: function(el) {
            el.find('li').removeClass('is-selected');
            el.find('[default]').addClass('is-selected');
            el.removeClass('is-selecting').parent().trigger('change');
            $body.removeClass('opacify');
            app.repositionSelectors();
        },
        updateFilters: function(resetTheme, resetMedia, resetAuthor) {
            filters.theme = $('#themeSelector').find('.is-selected').data('value');
            filters.media = $('#mediaSelector').find('.is-selected').data('value');
            filters.author = $('#authorSelector').find('.is-selected').data('value');
            if (resetTheme) filters.theme = '';
            if (resetMedia) filters.media = '';
            if (resetAuthor) filters.author = '';
            // combine filters
            filterValue = app.concatValues(filters);
            console.log(filterValue);
            app.loadAllSelectors(filterValue);
        },
        loadAllSelectors: function(filter) {
            $.ajax({
                url: $root + "/api/projects" + filter,
                dataType: "json",
                error: function() {
                    console.log("error");
                },
                success: function(data) {
                    //themes
                    $json = data;
                    console.log($json);
                    var newList = $();
                    var uniq = [];
                    if (!isMobile || firstSelectInit) {
                        $current = $theme.find('.is-selected').data('value');
                        $theme.children(':not([keep])').remove();
                        $(data).each(function() {
                            if (!isInArray(uniq, this.theme.slug)) {
                                $theme.append($('<li>', {
                                    "data-value": this.theme.slug,
                                    html: '<span>' + this.theme.title + '</span>',
                                }));
                                uniq.push(this.theme.slug);
                            }
                        });
                        if (!isInArray(uniq, $current)) {
                            $theme.find('[default]').addClass('is-selected');
                        } else {
                            $theme.children('[data-value="' + $current + '"]').addClass('is-selected');
                        }
                        //medias
                        newList = $();
                        uniq = [];
                        $current = $media.find('.is-selected').data('value');
                        $media.children(':not([keep])').remove();
                        $(data).each(function() {
                            if (!isInArray(uniq, this.media.slug)) {
                                $media.append($('<li>', {
                                    "data-value": this.media.slug,
                                    html: '<span>' + this.media.title + '</span>',
                                }));
                                uniq.push(this.media.slug);
                            }
                        });
                        if (isInArray(uniq, $current) || isInArray(['every'], $current)) {
                            $media.children('[data-value="' + $current + '"]').addClass('is-selected');
                        } else {
                            $media.find('[default]').addClass('is-selected');
                        }
                        //authors
                        newList = $();
                        uniq = [];
                        $current = $author.find('.is-selected').data('value');
                        $author.children(':not([keep])').remove();
                        $(data).each(function() {
                            if (!isInArray(uniq, this.author.slug)) {
                                $author.append($('<li>', {
                                    "data-value": this.author.slug,
                                    html: '<span>' + this.author.title + '</span>',
                                }));
                                uniq.push(this.author.slug);
                            }
                        });
                        if (isInArray(['everyone'], $current)) {
                            $author.children('[data-value="' + $current + '"]').addClass('is-selected');
                        } else if (!isInArray(uniq, $current)) {
                            $author.find('[default]').addClass('is-selected');
                        } else {
                            $author.children('[data-value="' + $current + '"]').addClass('is-selected');
                        }
                    }
                    if (isMobile) {
                        // Init sliders on mobile
                        if (firstSelectInit) {
                            $('.selector').each(function(index, el) {
                                $selectSliders[index] = $(this);
                                $selectSliders[index].flickity({
                                    cellSelector: 'li',
                                    imagesLoaded: false,
                                    setGallerySize: false,
                                    accessibility: true,
                                    wrapAround: true,
                                    prevNextButtons: true,
                                    pageDots: false,
                                    draggable: true,
                                    arrowShape: 'M28,50l40,50h-4L24,50L64,0h4L28,50z'
                                });
                                $selectSliders[index].flkty = $selectSliders[index].data('flickity');
                                $selectSliders[index].on('settle.flickity', function() {
                                    app.updateFilters();
                                });
                                $selectSliders[index].on('staticClick.flickity', function() {
                                    $selectSliders[index].flickity('select', 0, true, true);
                                    app.updateFilters();
                                });
                            });
                        } else {
                            if (data.length == 0) {
                                $('#selectorSubmit h2').addClass('disabled');
                            } else {
                                $('#selectorSubmit h2').removeClass('disabled');
                            }
                        }
                    }
                    //tous les parametres sont activés : SUBMIT
                    if (!isMobile && !firstSelectInit && filters.theme != '' && filters.media != '' && filters.author != '') {
                        $body.addClass('leaving');
                        setTimeout(function() {
                            $('#selectorSubmit h2').trigger('click');
                        }, 500);
                        return;
                    }
                    firstSelectInit = false;
                },
                cache: false
            });
        },
        sectionsMagnet: function() {
            var sectionsCount = $('.section-magnet').length;
            $('#page-content.magnet').fullpage({
                scrollingSpeed: 700,
                autoScrolling: true,
                scrollBar: false,
                easing: 'easeInOutCubic',
                easingcss3: 'ease',
                loopBottom: false,
                loopTop: false,
                loopHorizontal: true,
                continuousVertical: true,
                continuousHorizontal: false,
                scrollOverflow: !isMobile,
                scrollOverflowReset: false,
                scrollOverflowOptions: {
                    scrollbars: false
                },
                touchSensitivity: 5,
                normalScrollElements: '#infos-overlay',
                normalScrollElementTouchThreshold: 5,
                responsiveWidth: mobileWidth,
                bigSectionsDestination: 'top',
                navigation: false,
                controlArrows: false,
                verticalCentered: false,
                sectionSelector: '.section-magnet',
                onLeave: function(index, nextIndex){
                  if(nextIndex == 1) {
                      $infosOverlay.fadeOut(300);
                    }
                },
                afterLoad: function(anchorLink, index) {
                    $infosOverlay.find('.image-credits').remove();
                    $(this).find('.image-credits').clone().appendTo($infosOverlay);
                    if (index == sectionsCount - 1) {
                        var IScroll;
                        IScroll = $('.fp-scrollable').data('iscrollInstance');
                        if (IScroll) {
                            IScroll.scrollTo(0, 0, 0);
                        }
                    }
                    
                }
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
        ajaxLoading: function() {
            var ias = jQuery.ias({
                container: '#related-projects',
                item: '.project-item',
                pagination: '#pagination',
                next: '.next',
                negativeMargin: 250
            });
            ias.extension(new IASSpinnerExtension({
                html: '<div class="ias-loading row center"><h2>Loading next items…</h2></div>',
            }));
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