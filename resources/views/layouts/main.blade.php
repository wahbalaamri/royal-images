<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ __('Diwan of Royal Court - Royal Images') }}</title>
    <!--
Template 2109 The Card
http://www.tooplate.com/view/2109-the-card
-->
    <!-- load CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}" />

    <!-- Templatemo style -->
</head>

<body>
    <!-- Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="tm-main-container">
        <div class="tm-top-container">
            <!-- Menu -->
            <nav id="tmNav" class="tm-nav">
                <a class="tm-navbar-menu" href="#">Menu</a>
                <ul class="tm-nav-links">
                    <li class="tm-nav-item active">
                        <a href="/" class="tm-nav-link external">{{__('Home')}}</a>
                    </li>
                    <li class="tm-nav-item">
                        <a href="/images" class="tm-nav-link external">{{__('Images')}}</a>
                    </li>
                    <li class="tm-nav-item">
                        <a href="{{route('search')}}"  class="tm-nav-link external">{{__('Search')}}</a>
                    </li>
                    <li class="tm-nav-item">
                        <a href="/vipsNames"  class="tm-nav-link external">{{__('VIPs')}}</a>
                    </li>
                    <li class="tm-nav-item">
                        <a  href="/imageTypes" class="tm-nav-link external">{{__('Image Types')}}</a>
                    </li>
                </ul>
            </nav>

            <!-- Site header -->
            <header class="tm-site-header-box tm-bg-dark text-center">
                <img src="{{ asset('img/diwann.png') }}" alt="" srcset="">
                <h1 class="tm-site-title">{{ __('Diwan of Royal Court') }}</h1>
                <p class="mb-0 tm-site-subtitle text-uppercase">Royal images</p>
            </header>
        </div>
        <!-- tm-top-container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Site content -->
                    <div class="tm-content">
                        <!-- Section 0 Introduction -->
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        <div class="tm-bottom-container" style="min-width: 100%">

            <!-- Footer -->
            <footer>
                <span class="" >
                    Copyright &copy;2022 Diwan of Royal Court ||

                    Design: <a rel="nofollow" href="#">General Directorate of Communication and information system</a>
                    ||
                </span>
            </footer>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/background.cycle.js') }}"></script>
    <script src="{{ asset('slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        let slickInitDone = false;
        let previousImageId = 0,
            currentImageId = 0;
        let pageAlign = "right";
        let bgCycle;
        let links;
        let eachNavLink;

        window.onload = function() {
            $("body").addClass("loaded");
        };

        function navLinkClick(e) {
            if ($(e.target).hasClass("external")) {
                return;
            }

            e.preventDefault();

            if ($(e.target).data("align")) {
                pageAlign = $(e.target).data("align");
            }

            // Change bg image
            previousImageId = currentImageId;
            currentImageId = $(e.target).data("linkid");
            bgCycle.cycleToNextImage(previousImageId, currentImageId);

            // Change menu item highlight
            $('.tm-nav-item:eq(${previousImageId})').removeClass("active");
            $('.tm-nav-item:eq(${currentImageId})').addClass("active");

            // Change page content
            $('.tm-section-${previousImageId}').fadeOut(function(e) {
                $('.tm-section-${currentImageId}').fadeIn();
                // Gallery
                if (currentImageId === 2) {
                    setupSlider();
                }
            });

            adjustFooter();
        }

        $(document).ready(function() {
            // Set first page
            // $(".tm-section").fadeOut(0);
            $(".tm-section-0").fadeIn();

            // Set Background images
            // https://www.jqueryscript.net/slideshow/Simple-jQuery-Background-Image-Slideshow-with-Fade-Transitions-Background-Cycle.html
            bgCycle = $("body").backgroundCycle({
                imageUrls: [
                    "{{ asset('img/alalam-palace-5g.jpg') }}",
                    "{{ asset('img/alalam-palace-4.jpg') }}",
                    "{{ asset('img/alalam-palace-4.jpg') }}",
                    "{{ asset('img/alalam-palace-4.jpg') }}"
                ],
                fadeSpeed: 2000,
                duration: -1,
                backgroundSize: SCALING_MODE_COVER
            });

            eachNavLink = $(".tm-nav-link");
            links = $(".tm-nav-links");

            // "Menu" open/close
            if (links.hasClass("open")) {
                links.fadeIn(0);
            } else {
                links.fadeOut(0);
            }

            $("#tm_about_link").on("click", navLinkClick);
            $("#tm_work_link").on("click", navLinkClick);

            // Each menu item click
            eachNavLink.on("click", navLinkClick);

            $(".tm-navbar-menu").click(function(e) {
                if (links.hasClass("open")) {
                    links.fadeOut();
                } else {
                    links.fadeIn();
                }

                links.toggleClass("open");
            });

            // window resize
            $(window).resize(function() {
                // If current page is Gallery page, set it up
                if (currentImageId === 2) {
                    setupSlider();
                }

                // Adjust footer
                adjustFooter();
            });

            adjustFooter();
            $(".cycle-bg-image").css({
                "background-position": 'center'
            })
        }); // DOM is ready

        function adjustFooter() {
            const windowHeight = $(window).height();
            const topHeight = $(".tm-top-container").height();
            const middleHeight = $(".tm-content").height();
            let contentHeight = topHeight + middleHeight;

            if (pageAlign === "left") {
                contentHeight += $(".tm-bottom-container").height();
            }

            if (contentHeight > windowHeight) {
                $(".tm-bottom-container").addClass("tm-static");
            } else {
                $(".tm-bottom-container").removeClass("tm-static");
            }
        }

        function setupSlider2() {
            let slidesToShow = 4;
            let slidesToScroll = 2;
            let windowWidth = $(window).width();

            if (windowWidth < 480) {
                slidesToShow = 1;
                slidesToScroll = 1;
            } else if (windowWidth < 768) {
                slidesToShow = 2;
                slidesToScroll = 1;
            } else if (windowWidth < 992) {
                slidesToShow = 3;
                slidesToScroll = 2;
            }

            if (slickInitDone) {
                $(".tm-gallery").slick("unslick");
            }

            slickInitDone = true;

            $(".tm-gallery").slick({
                dots: true,
                customPaging: function(slider, i) {
                    var thumb = $(slider.$slides[i]).data();
                    return '<a>${i + 1}</a>';
                },
                infinite: true,
                prevArrow: false,
                nextArrow: false,
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll
            });

            // Open big image when a gallery image is clicked.
            $(".slick-list").magnificPopup({
                delegate: "a",
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        }
    </script>

</body>

</html>