(function ($) {
	"use strict";


    /*
    $(document).ready(function() {
        $("#tab-title-description").addClass('active' );
        $("#tab-description").css('display' , 'block');
    })
    */

    //ie detect
    var $body = $('body'),
        $html = $('html');



    if (getInternetExplorerVersion() !== -1) {
        $html.addClass("ie");
    };

    function getInternetExplorerVersion(){
        var rv = -1;
        if (navigator.appName === 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat(RegExp.$1);
        } else if (navigator.appName === 'Netscape') {
            var ua = navigator.userAgent;
            var re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat(RegExp.$1);
        }
        return rv;
    };

    if (/Edge/.test(navigator.userAgent)){
        $html.addClass('edge');
    };


    var $slickBtnPrev =  '<button type="button" data-role="none" class="slick-prev" aria-label="previous"><svg class="icon icon-arrow-left" width="22" height="41" viewBox="0 0 22 41" xmlns="http://www.w3.org/2000/svg"><path d="M20.5312 40.5L0.53125 20.5L20.5312 0.5L21.4688 1.4375L2.44531 20.5L21.4688 39.5625L20.5312 40.5Z"/></svg></button>',
        $slickBtnNext =  '<button type="button" data-role="none" class="slick-next" aria-label="next"><svg class="icon icon-arrow-right" width="22" height="41" viewBox="0 0 22 41" xmlns="http://www.w3.org/2000/svg"><path d="M1.66875 40.5L21.6688 20.5L1.66875 0.5L0.731251 1.4375L19.7547 20.5L0.731251 39.5625L1.66875 40.5Z"/></svg></button>';

    if ($("body").hasClass("rtl")) {
        $('.slick-slider').attr('dir', 'rtl');
        var $rtlActive = true;
    } else {
        var $rtlActive = false;
    }

    var $document = $(document),
		$window = $(window),

		themeOptions = {
			stickyHeader: true,
			smoothScroll: false,
			backToTop: true
		},

		themeBlocks = {
			studioSlider: $('.ini-studio-gallery'),
            studioImageTextSlider: $('.ini-studio-image-text-gallery'),

            projectSlider: $('.ini-project-slider'),
			reviewsSlider: $('.ini-reviews-slider'),
			teamSliderMobile: $('.ini-team-slider-mobile'),
			teamSlider2: $('.ini-team-slider'), 
			newsSlider: $('.ini-news-slider-mobile'),
			stickyHeader: $('.header--sticky'),
			bottomPlayer: $('#awp-wrapper'),
			ourClientSlider: $('.ini-client-slider'),
			newsTicker: $(".tickerwrapper"),
			rangeSlider: $('#rangeSlider1'),
			productImage: $("#mainImage"),
			prdCarousel: $('.prd-carousel'),
            icnTextSlider: $('.ini-icn-text-slider')

        };

	$document.ready(function () {
		var windowWidth = window.innerWidth || $window.width();
		var windowH = $window.height();
		studioSlider();
        studioImageTextSlider();
        projectSlider();
		reviewsSlider();
		teamSlider2();
        icnTextSlider();
        ourClientSlider();
		newsSlider();
		iniPlayer();
		headerSearch();
		textSlider();
		mobileMenu(windowWidth);
		allViewMobile();
		formAddRow();
		iniPopup();
		filtersGrid();
		filtersBlogGrid();
		filterClient();
		newsTicker();
		is_touch_device();
		backToTop('.ini-backToTop', themeOptions.backToTop);
		changeInput();
		if (themeOptions.smoothScroll) {
			$('html').scrollWithEase();
		}
		//if (windowWidth < 1026) {
			slickMobile(themeBlocks.teamSliderMobile, 1025, 2, 1);
		//}
		if (themeOptions.stickyHeader) {
			$(themeBlocks.stickyHeader).stickyHeader();
		}
		if ($("#tableFix").length) {
			$("#tableFix").tableHeadFixer({
				"head": false,
				"left": 1
			});
		}
		setTimeout(function () {
			$('body').addClass('is-loaded');
        }, 1000);

        $(".woocommerce-product-rating .woocommerce-review-link" ).on( "click", function() {
            $( ".wc-tabs li" ).each(function() {
                $( this ).removeClass( "active" );
            });
            $( ".wc-tabs .woocommerce-Tabs-panel" ).each(function() {
                $( this ).hide();
            });
            $("#tab-review").show();
            $("#tab-title-review").addClass("active");
            $('body').scrollTo('#commentform');
        });


        setTimeout(function () {
            $('.woocommerce-message').remove();
        }, 2000);


        $window.on('resize', function () {
			var windowWidth = window.innerWidth || $window.width();
			//if (windowWidth < 1026) {
				slickMobile(themeBlocks.teamSliderMobile, 1025, 2, 1);
			//}
		});
		$(window).on('resize', debouncer(function (e) {
			var windowWidth = window.innerWidth || $window.width();
			if (themeOptions.stickyHeader) {
				$(themeBlocks.stickyHeader).stickyHeader();
			}
		}));
	});
	$window.on('load', function () {
		var windowWidth = window.innerWidth || $window.width();
		$('body').addClass('is-loaded');
	});
	function is_touch_device() {
		try {
			document.createEvent("TouchEvent");
			$('body').addClass('touch');
		} catch (e) {
			return false;
		}
	}

	// time out resize
	function debouncer(func, timeout) {
		var timeoutID,
			timeout = timeout || 500;
		return function () {
			var scope = this,
				args = arguments;
			clearTimeout(timeoutID);
			timeoutID = setTimeout(function () {
				func.apply(scope, Array.prototype.slice.call(args));
			}, timeout);
		};
	}

	function iniPopup() {
		$('.open-popup-link').magnificPopup({
			type: 'inline',
			removalDelay: 500,
			callbacks: {
				beforeOpen: function () {
					this.st.mainClass = this.st.el.attr('data-effect');
					$('header').css({
						'width': $('header').outerWidth() + 'px'
					});
					$('body').addClass('mfp-is-open');

                    $('html').addClass('html_fix');

                },
				close: function () {
					$('body').removeClass('mfp-is-open');
                    $('html').removeClass('html_fix');

                    $('header').css({
						'width': ''
					});
				}
			}
		});
		$('.open-popup-image').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	}

	function filtersGrid() {
		var filtr,
			$filterList = $('.filtr-row li'),
			$filterContainer = $('.filtr-container'),
			$showMore = $('.filtr-showmore');
		if ($filterContainer.length) {
			$filterList.on('click', function () {
				$filterList.removeClass('active');
				$(this).addClass('active');
			});
			$filterContainer.imagesLoaded(function () {
				filtr = $filterContainer.filterizr('setOptions', {
					delay: 50,
					delayMode: 'progressive',
					layout: 'sameSize'
				});
				$filterContainer.addClass('is-loaded');
			});
			$showMore.on('click', function (e) {
				e.preventDefault();
				var toAppend = $('.more-content').children();
				filtr._fltr.appendToGallery(toAppend);
				$(this).hide();
			});
		}
		$('.project-grid-item').find('.link-social').on('click', function (e) {
			e.stopPropagation();
		})
	}

	
	function filtersBlogGrid() {
		var $filterContainer = $('.blog-grid');
		if ($filterContainer.length) {
			var filtr = $filterContainer.imagesLoaded(function () {
				$filterContainer.filterizr('setOptions', {
					layout: 'sameWidth'
				});
				$window.resize();
			})
		}
	}

	function filterClient() {
		var $clientitem = $(".clients-list-column > li"),
			$filter = $(".simple-filter > li"),
			selectedCategory = "",
			activeStart;
		$filter.each(function () {
			selectedCategory = $(this).attr("data-filter");
			if ($(this).hasClass('active')) {
				console.log(selectedCategory)
				$clientitem.filter(':not(' + selectedCategory + ')').fadeOut(0).removeClass('isvisible');
				activeStart = true;
			} else {
				$clientitem.fadeIn(0).addClass('isvisible');
			}
		});
		if (!activeStart) $(".client-filter li:first-child").addClass('active');
		$filter.on('click', function (e) {
			e.preventDefault();
			if ($(this).hasClass('active')) {
				return false;
			} else {
				$filter.removeClass('active');
				$(this).addClass('active')
			}
			selectedCategory = $(this).attr("data-filter");
			if (!selectedCategory) {
				$clientitem.fadeIn(0).addClass('isvisible');
			} else {
				$clientitem.filter(':not(' + selectedCategory + ')').fadeOut(0).removeClass('isvisible');
				$clientitem.filter(selectedCategory).fadeIn(0).addClass('isvisible');
			}
		});
	}

	function formAddRow() {
		$("#btnAddRow").on("click", function (e) {
			e.preventDefault();
			var div = $("<div />");
			div.html(GetDynamicTextBox(""));
			$("#rowMiltipleBooking").append(div);
		});
		$("body").on("click", ".remove-btn", function (e) {
			e.preventDefault();
			$(this).closest(".form-row").remove();
		});

		function GetDynamicTextBox(value) {
			return '<div class="form-row"><div class="btn-place"></div><div class="form-group sm-full"><div class="select-wrapper"><select name="service" class="input-custom"><option value="1">Recording</option><option value="2">Production</option><option value="3">Mixing</option><option value="4">Engineering</option></select></div></div><div class="form-group"><div class="select-wrapper"><select name="hours" class="input-custom"><option value="1">1 Hour</option><option value="2">2 Hour</option><option value="3">4 Hour</option><option value="4">6 Hour</option></select></div></div><div class="form-group"><div class="datetimepicker-wrap"><input type="text" name="date" class="form-control input-custom datetimepicker" placeholder=""></div></div><div class="btn-place"><a href="#" class="remove-btn">-</a></div></div>'
		}
	}

	function allViewMobile() {
		$("[data-show-xs]").on('click', function (e) {
			e.preventDefault();
			$('.' + $(this).attr('data-show-xs')).each(function () {
				$(this).toggleClass('collapsed-xs');
			})
			$(this).hide();
		})
		$("[data-show-sm]").on('click', function (e) {
			e.preventDefault();
			$('.' + $(this).attr('data-show-sm')).each(function () {
				$(this).toggleClass('collapsed-sm');
			})
			$(this).hide();
		})
	}

	function slickMobile(slider, breakpoint, slidesToShow, slidesToScroll) {
		if (slider.length) {
			var windowWidth = window.innerWidth || $window.width();
			if (windowWidth < breakpoint) {
				slider.slick({
                    rtl:$rtlActive,
                    prevArrow: $slickBtnPrev,
                    nextArrow: $slickBtnNext,

                    mobileFirst: true,
					//slidesToShow: 1,
					//slidesToScroll: 1,
					infinite: true,
					autoplay: true,
					autoplaySpeed: 3000,
					arrows: false,
					dots: true,
					speed: 700,

                    responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                        {
                            //breakpoint: (breakpoint - 1),
                            settings: "unslick"
                    }]
				});
			}
		}
	}

	$.fn.stickyHeader = function () {
		var $header = this,
			$body = $('body'),
			headerOffset = $header.find('.header-wrap').height() + 50;
		var windowWidth = window.innerWidth || $window.width();

		$(window).scroll(function () {
			var st = getCurrentScroll();
			if (st > headerOffset) {
				$header.addClass('is-sticky');
				$body.addClass('hdr-sticky');
			} else {
				$header.removeClass('is-sticky');
				$body.removeClass('hdr-sticky');
			}
		});
		$(window).scroll();

		function getCurrentScroll() {
			return window.pageYOffset || document.documentElement.scrollTop;
		}
	};

	function studioSlider() {
		if (themeBlocks.studioSlider.length) {
			themeBlocks.studioSlider.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
				arrows: true,
				centerMode: true,
				centerPadding: '28.4%',
				autoplay: true,
				autoplaySpeed: 5000,
				speed: 1000,
				cssEase: 'ease-in-out',
				responsive: [{
					breakpoint: 1025,
					settings: {
						centerPadding: '25%',
						arrows: false,
						dots: true
					}
			}, {
					breakpoint: 768,
					settings: {
						centerPadding: '0',
						arrows: false,
						dots: true
					}
			}]
			})
			$('.studio-item').on('click', function (e) {
				if ($('body').hasClass('touch') && !$(this).hasClass('hovered')) {
					e.preventDefault();
					$('.studio-item').removeClass('hovered');
					$(this).addClass('hovered')
				}
			})
			$(document).on('click touchstart', function (e) {
				var target = $(e.target);
				if (!target.closest('.studio-item').length) {
					$('.studio-item').removeClass('hovered');
				}
			});
		}
	}
    function studioImageTextSlider() {
        if (themeBlocks.studioImageTextSlider.length) {
            themeBlocks.studioImageTextSlider.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                customPaging: function(slider, i) {
                    return '<span>' + $(slider.$slides[i]).find(".studio-item-inner").attr('data-slide-name') + '</span>';
                },
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 500,
                responsive: [{
                    breakpoint: 1025,
                    settings: {
                        arrows: false,
                        dots: true
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        arrows: false,
                        dots: true
                    }
                }]
            })
        }
    }

    function changeArrowPos(slider) {
		var $slider = slider,
			toppos = ($('.slick-active', $slider).find("img").height() / 2);
		$('.slick-prev, .slick-next', $slider).css('top', toppos + 'px');
	}

	function projectSlider() {
		if (themeBlocks.projectSlider.length) {
			var $el = themeBlocks.projectSlider;
			$el.imagesLoaded(function () {
				changeArrowPos($el)
			});
			$(window).on('resize', debouncer(function (e) {
				changeArrowPos($el)
			}));
			$el.on('init', function () {
				changeArrowPos($el)
			});
			$el.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
				arrows: true,
				speed: 700,
				autoplay: true,
				autoplaySpeed: 4000,
				responsive: [{
					breakpoint: 992,
					settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false
					}
			}, {
					breakpoint: 481,
					settings: {
						slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
			}]
			})
		}
	}

	function newsSlider() {
		if (themeBlocks.newsSlider.length) {
			var $el = themeBlocks.newsSlider;
			$el.imagesLoaded(function () {
				changeArrowPos($el)
			});
			$(window).on('resize', debouncer(function (e) {
				changeArrowPos($el)
			}));
			$el.on('init', function () {
				changeArrowPos($el)
			});
			$el.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
				arrows: true,
				speed: 700,
				autoplay: true,
				autoplaySpeed: 4000,
				responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						dots: true,
						arrows: false
					}
			}, {
					breakpoint: 481,
					settings: {
						slidesToShow: 1,
						dots: true,
						arrows: false
					}
			}]
			})
		}
	}

	function ourClientSlider() {
		if (themeBlocks.ourClientSlider.length) {
			var $el = themeBlocks.ourClientSlider;
			$el.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				dots: true,
				arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 700,
				responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						dots: true,
						arrows: false
					}
			}, {
					breakpoint: 481,
					settings: {
						slidesToShow: 1,
						dots: true,
						arrows: false
					}
			}]
			})
		}
	}
	function reviewsSlider() {
		if (themeBlocks.reviewsSlider.length) {
			themeBlocks.reviewsSlider.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
				arrows: true,
				autoplay: true,
				speed: 500,
				//fade: true,
				autoplaySpeed: 5000,

                responsive: [{
                    breakpoint: 1199,
                    settings: {
                        arrows: false,
                        dots: true
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        autoplay: false,
                        arrows: false
                    }
                }]
			})
		}
	}

	function teamSlider2() {
		if (themeBlocks.teamSlider2.length) {
			themeBlocks.teamSlider2.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: true,
				arrows: true,
				autoplay: true,
				autoplaySpeed: 5000,
                responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows:false
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            })
		}
	}

    function icnTextSlider() {
        if (themeBlocks.icnTextSlider.length) {
            themeBlocks.icnTextSlider.slick({
                rtl:$rtlActive,
                prevArrow: $slickBtnPrev,
                nextArrow: $slickBtnNext,

                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: false,
                dots: false,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        dots: true
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        dots: true
                    }
                }]
            })
        }
    }




    function textSlider() {
        var animationDelay = 2500,
            lettersDelay = 50;

        initHeadline();

		function initHeadline() {
			singleLetters($('.cd-headline').find('li'));
			animateHeadline($('.cd-headline'));
		}

		function singleLetters($words) {
			$words.each(function () {
				var word = $(this),
					letters = word.text().split(''),
					selected = word.hasClass('is-visible');
				var i, l;
				for (i = 0, l = letters.length; i < l; i++) {
					letters[i] = '<em>' + letters[i] + '</em>';
					letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>' : '<i>' + letters[i] + '</i>';
				}
				var newLetters = letters.join('');
				word.html(newLetters);
			});
		}

		function animateHeadline($headlines) {
			var duration = animationDelay;
			$headlines.each(function () {
				var headline = $(this);
				var spanWrapper = headline.find('.cd-words-wrapper'),
					newWidth = spanWrapper.width() + 5;
				spanWrapper.css('width', newWidth);
				setTimeout(function () {
					hideWord(headline.find('.is-visible').eq(0))
				}, duration);
			});
		}

		function hideWord($word) {
			var nextWord = takeNext($word);
			if ($word.parents('.cd-headline').hasClass('letters')) {
				var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
				hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
				showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);
			} else {
				switchWord($word, nextWord);
				setTimeout(function () {
					hideWord(nextWord)
				}, animationDelay);
			}
		}

		function hideLetter($letter, $word, $bool, $duration) {
			$letter.removeClass('in').addClass('out');
			if (!$letter.is(':last-child')) {
				setTimeout(function () {
					hideLetter($letter.next(), $word, $bool, $duration);
				}, $duration);
			} else if ($bool) {
				setTimeout(function () {
					hideWord(takeNext($word))
				}, animationDelay);
			}
			if ($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
				var nextWord = takeNext($word);
				switchWord($word, nextWord);
			}
		}

		function showLetter($letter, $word, $bool, $duration) {
			$letter.addClass('in').removeClass('out');
			if (!$letter.is(':last-child')) {
				setTimeout(function () {
					showLetter($letter.next(), $word, $bool, $duration);
				}, $duration);
			} else {
				if (!$bool) {
					setTimeout(function () {
						hideWord($word)
					}, animationDelay)
				}
			}
		}

		function takeNext($word) {
			return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
		}

		function takePrev($word) {
			return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
		}

		function switchWord($oldWord, $newWord) {
			$oldWord.removeClass('is-visible').addClass('is-hidden');
			$newWord.removeClass('is-hidden').addClass('is-visible');
		}
	}
	function headerSearch() {
		$('#toggle-search').on('click', function () {
			$('header .search-form, #toggle-search').toggleClass('open');
			return false;
		});
		$('header .search-form input[type=submit]').on('click', function () {
			$('header .search-form, #toggle-search').toggleClass('open');
			return true;
		});
		$(document).on('click', function (event) {
			var target = $(event.target);
			if (!target.is('#toggle-search') && !target.closest('header .search-form').length) {
				$('header .search-form, #toggle-search').removeClass('open');
			}
		});
	}

	function newsTicker() {
		if (themeBlocks.newsTicker.length) {
			var $tickerWrapper = themeBlocks.newsTicker.show();
			var $list = $tickerWrapper.find("ul.ticker");
			var $clonedList = $list.clone();
			var listWidth = 10;
			$list.find("li").each(function (i) {
				listWidth += $(this, i).outerWidth(true);
			});
			var endPos = $tickerWrapper.width() - listWidth;
			$list.add($clonedList).css({
				"width": listWidth + "px"
			});
			$clonedList.addClass("cloned").appendTo($tickerWrapper);

			var infinite = new TimelineMax({
				force3D: true,
				repeat: -1,
				paused: false
			});
			var time = $tickerWrapper.attr('data-speed') ? $tickerWrapper.attr('data-speed') : 25;
			infinite.fromTo($list, time, {
				x: 0
			}, {
				x: -listWidth,
				ease: Linear.easeNone
			}, 0);
			infinite.fromTo($clonedList, time, {
				x: listWidth
			}, {
				x: 0,
				ease: Linear.easeNone
			}, 0);
			infinite.set($list, {
				x: listWidth
			});
			infinite.to($clonedList, time, {
				x: -listWidth,
				ease: Linear.easeNone
			}, time);
			infinite.to($list, time, {
				x: 0,
				ease: Linear.easeNone
			}, time);

			$tickerWrapper.on("mouseenter", function () {
				infinite.pause();
			}).on("mouseleave", function () {
				infinite.play();
			});
		}
	}

	function iniPlayer() {
		if (location.hostname === "localhost" || location.hostname === "127.0.0.1" || location.hostname === "") {
			return false;
		} else {
			var ctx = document.createElement('canvas').getContext('2d');
			var progress_color = ctx.createLinearGradient(0, 0, 1000, 0);
			progress_color.addColorStop(0, '#7B16D9');
			progress_color.addColorStop(1, '#FF6600');
			if ($("#awp-project-player").length) {
				var awp_player1;
				var settings = {
					instanceName: "voicer1",
					sourcePath: "",
					playlistList: "#awp-project-playlist",
					activePlaylist: "playlist-1",
					activeItem: 0,
					volume: 0.5,
					autoPlay: false,
					randomPlay: false,
					loopingOn: true,
					autoAdvanceToNextMedia: true,
					mediaEndAction: "loop",
					useKeyboardNavigationForPlayback: true,
					usePlaylistScroll: true,
					playlistScrollOrientation: "vertical",
					playlistScrollTheme: "records",
					useDownload: true,
					useShare: true,
					useTooltips: false,
					useNumbersInPlaylist: true,
					numberTitleSeparator: ".  ",
					artistTitleSeparator: " - ",
					playlistItemContent: "title",
					wavesurfer: {
						waveColor: '#6e6e6e',
						progressColor: progress_color,
						barWidth: 1,
						cursorColor: 'transparent',
						cursorWidth: 1,
						height: 50
					}
				};
				awp_player1 = $("#awp-project-player").awp(settings);
			}
			if ($("#awp-home-player").length) {
				var awp_player2;
				var settings = {
					instanceName: "voicer2",
					sourcePath: "",
					playlistList: "#awp-home-playlist",
					activePlaylist: "playlist-2",
					activeItem: 0,
					volume: 0.5,
					autoPlay: false,
					drawWaveWithoutLoad: false,
					randomPlay: false,
					loopingOn: true,
					autoAdvanceToNextMedia: true,
					mediaEndAction: "loop",
					useKeyboardNavigationForPlayback: false,
					numberTitleSeparator: ".  ",
					artistTitleSeparator: " - ",
					playlistItemContent: "title",
					wavesurfer: {
						waveColor: '#6e6e6e',
						progressColor: progress_color,
						barWidth: 1,
						cursorColor: 'transparent',
						cursorWidth: 1,
						height: 50
					}
				};
				awp_player2 = $("#awp-home-player").awp(settings);
			}
			if ($("#awp-grid-player").length) {
				var awp_player3;
				var settings = {
					instanceName: "voicer3",
					sourcePath: "",
					playlistList: "#awp-grid-playlist",
					activePlaylist: "playlist-3",
					activeItem: 0,
					volume: 0.5,
					autoPlay: false,
					drawWaveWithoutLoad: false,
					randomPlay: false,
					loopingOn: true,
					autoAdvanceToNextMedia: true,
					mediaEndAction: "loop",
					numberTitleSeparator: ".  ",
					artistTitleSeparator: " - ",
					playlistItemContent: "title",
					wavesurfer: {
						waveColor: '#6e6e6e',
						progressColor: progress_color,
						barWidth: 1,
						cursorColor: 'transparent',
						cursorWidth: 1,
						height: 50
					}
				};
				awp_player3 = $("#awp-grid-player").awp(settings);
			}
			$('.popup-player-link').on("click", function () {
				var trackNum = parseInt($(this).attr('data-track'), 10);
				awp_player3.loadMedia(trackNum - 1);
				return false;
			})
		}
	}

	function backToTop(button, flag) {
		if (flag) {
			var $button = $(button);
			$(window).on('scroll', function () {
				if ($(this).scrollTop() >= 500) {
					$button.addClass('visible');
				} else {
					$button.removeClass('visible');
				}
			});
			$button.on('click', function () {
				$('body,html').animate({
					scrollTop: 0
				}, 1000);
			});
		} else {
			$(button).hide();
		}
	}

	function mHeight() {
		return $(window).height() - 65;
	}

	function mobileMenu(windowWidth) {
		var $menu = $('.header .header-menu'),
			$menuWrap = $menu,
			$menuToggle = $('.menu-toggle'),
			$menuSub = $('.header .menu'),
			$menuArrow = $('.header .menu .arrow');
		$menuToggle.on('click', function (e) {
			e.preventDefault();
			var $this = $(this);
			if (!$menu.hasClass('opened')) {
				$menu.addClass('opened');
				$this.addClass('opened');
				$('body').addClass('fixed');
				$menuWrap.css({
					'height': mHeight() + 'px'
				});
			} else {
				$menu.removeClass('opened');
				$this.removeClass('opened');
				$('body').removeClass('fixed');
				$menuWrap.css({
					'height': ''
				});
			}
		});
		$('.darkOverlay').on('click', function (e) {
			$menu.removeClass('opened');
			$menuToggle.removeClass('opened');
			$('body').removeClass('fixed');
			$menuWrap.css({
				'height': ''
			});
		})
		$menuArrow.on('click', function (e) {
			e.preventDefault();
			var $this = $(this).parent('a');
			$this.next('ul').slideToggle();
			$this.toggleClass('opened');
		});
		$(window).on('resize', function () {
			var w = $(window).width();
			if (w > 1024 && $menu.hasClass('opened')) {
				$menu.removeClass('opened');
				$menuToggle.removeClass('opened');
				$('body').removeClass('fixed');
				$menuWrap.css({
					'height': ''
				});
			}
		});
	}

	if (themeBlocks.rangeSlider.length) {
		var rangeSlider1 = document.getElementById('rangeSlider1');
		noUiSlider.create(rangeSlider1, {
			start: [100, 2000],
			connect: true,
			step: 100,
			padding: 100,
			range: {
				'min': 0,
				'max': 10100
			}
		});
		var number1_1 = document.getElementById('number-1-1');
		var number1_2 = document.getElementById('number-1-2');
		rangeSlider1.noUiSlider.on('update', function (values, handle) {
			var value = values[handle];
			if (handle) {
				number1_1.textContent = Math.round(value);
			} else {
				number1_2.textContent = Math.round(value);
			}
		});
		number1_1.addEventListener('change', function () {
			rangeSlider1.noUiSlider.set([this.textContent, null]);
		});
		number1_2.addEventListener('change', function () {
			rangeSlider1.noUiSlider.set([null, this.textContent]);
		});
	}
	
	if (themeBlocks.productImage.length) {
		var zoomPos = $('body').hasClass('rtl') ? 11 : 1;
		themeBlocks.productImage.elevateZoom({
			gallery: 'productPreviews',
			cursor: 'pointer',
			galleryActiveClass: 'active',
			zoomWindowPosition: zoomPos,
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 500,
			lensFadeIn: 500,
			lensFadeOut: 500
		});
		var ezApi = themeBlocks.productImage.data('elevateZoom');
		if ((window.innerWidth || $window.width()) < 769) {
			ezApi.changeState('disable');
		}
		$(window).on('resize', function () {
			if ((window.innerWidth || $window.width()) < 769) {
				ezApi.changeState('disable');
			} else {
				ezApi.changeState('enable');
			}
		});
		$('#productPreviews > a').on('click', function () {
			themeBlocks.productImage.attr({
				src: $(this).attr('data-image'),
				'data-zoom-image': $(this).attr('data-zoom-image')
			});
		});
	}

	if (themeBlocks.prdCarousel.length) {
		themeBlocks.prdCarousel.slick({
            rtl:$rtlActive,
            prevArrow: $slickBtnPrev,
            nextArrow: $slickBtnNext,

            slidesToShow: 4,
			slidesToScroll: 1,
			infinite: true,
			dots: true,
			arrows: false,
			responsive: [{
				breakpoint: 991,
				settings: {
					slidesToShow: 3
				}
					}, {
				breakpoint: 767,
				settings: {
					slidesToShow: 2
				}
					}, {
				breakpoint: 481,
				settings: {
					slidesToShow: 1
				}
					}]
		});
	}
	
	// icrease/decrease input
	function changeInput() {
		$(document).on('click', '.count-add, .count-reduce', function (e) {
			var $this = $(e.target),
				input = $this.parent().find('.count-input'),
				valString = input.val(),
				valNum = valString.replace(/[^0-9]/g, ''),
				valText = valString.replace(/[0-9]/g, ''),
				v = $this.hasClass('count-reduce') ? valNum - 1 : valNum * 1 + 1,
				min = input.attr('data-min') ? input.attr('data-min') : 0;
			if (v >= min) input.val(v + valText);
			e.preventDefault();
		});
	}

    function toggleCart(cart, drop) {
        $('> a', $(cart)).on('click', function () {
			$(cart).toggleClass('opened');
		});

		$(document).on('click', function (e) {
			if (!$(e.target).closest(cart).length) {
				if ($(cart).hasClass("opened")) {
					$(cart).removeClass('opened');
				}
			}
		});
	}
})(jQuery);