<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() == 'en' ? 'ltr' : 'rtl' }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Online fitness gym for ladies from all over the world, providing online classes in groups and individual nutrition plans & management">
    <meta name="author" content="">
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo.png') }}" rel="apple-touch-icon">
    <title>Nourish Fitness Virtual Gym - Online Gym, Classes & Nutrition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/js/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @php if(App::getLocale() == 'ar') { @endphp
    <link rel="stylesheet" href="{{ asset('assets/css/style-ar.css') }}">
    @php } else { @endphp
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @php } @endphp
    <link href="{{asset('assets/js/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <!-- Google Analytics tag -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LKM9QZFTQF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-LKM9QZFTQF');

    </script>

<!-- Meta Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '299777109408756');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=299777109408756&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

    @yield('head')
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ asset('logo.png')}}" width="125" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item nav-list">
                    <a class="nav-link" href="{{url('/')}}">@lang('landing.menu.home')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="#services">@lang('landing.menu.services')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="#our-classes">@lang('landing.menu.classes')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="#coach">@lang('landing.menu.teams')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link translat" href="#review">@lang('landing.menu.review')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="#pricing">@lang('landing.menu.pricing')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="#footer">@lang('landing.menu.contact_us')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="{{url('/blog')}}">@lang('landing.menu.blog')</a>
                </li>
                <li class="nav-item nav-list">
                    <a class="nav-link" href="{{url('/faq')}}">FAQ</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    <a style="background-color: antiquewhite;" class="mx-2 py-2 px-2 {{ App::getLocale() == 'ar' ? 'border-start' : 'border-end' }} border-dark text-decoration-none text-dark" href="/change-language/{{ App::getLocale() == 'ar' ? 'en' : 'ar' }}">{{ App::getLocale() == 'ar' ? 'EN' : 'العربيه' }}</a>

                </li>
                @if(!Auth::user())
                <li class="nav-item d-flex align-items-center justify-content-center ">
                    <a href="{{url('/userregister')}}" type="button" class="register-btn text-white">@lang('landing.menu.register')</a>
                </li>
                <li class="nav-item">
                    <button class="signin-btn" style="color: white;" onclick="redirectToSubdomain()">@lang('landing.menu.signin')</button>
                </li>
                @else
                <li><a href="{{ url('/logout') }}">@lang('landing.menu.register')</a></li>
                @endif
            </ul>
        </div>
    </nav>


    <!-- Main Content -->

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <img src="{{ asset('assets/img/logo.png')}}" width="100" alt="">
                            <p>
                                <strong>@lang('landing.footer.whatsapp')</strong> +971561976784<br>
                                <strong>@lang('landing.footer.email')</strong> info@nourishfitness.net<br>
                            </p>
                            <div class="social-links mt-3">
                                <!--
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                                <a href="https://www.facebook.com/M.Nourish.Health/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/_nourishfitness/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                                <a href="https://wa.me/+971561976784" class="whatsapp" target=""><i class="bx bxl-whatsapp"></i></a>
                                <!--                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>@lang('landing.footer.links')</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#home">@lang('landing.menu.home')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">@lang('landing.menu.services')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#coach">@lang('landing.menu.teams')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#our-classes">@lang('landing.menu.classes')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="review">@lang('landing.menu.review')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#pricing">@lang('landing.menu.pricing')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{url('blog')}}">@lang('landing.menu.blog')</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <div>
                            <h4>@lang('landing.footer.services')</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#services">@lang('landing.footer.service_1') </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#services">@lang('landing.footer.service_2') </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#services">@lang('landing.footer.service_3') </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#services">@lang('landing.footer.service_4')</a></li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <h4>@lang('landing.footer.user_links')</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="/faq">FAQ</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="/privacy-policy">@lang('landing.footer.privacy-policy') </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>@lang('landing.footer.news_letter_label')</h4>
                        <p>@lang('landing.footer.news_letter_text')</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="@lang('landing.footer.subscribe')">
                        </form>
                    </div>


                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="copyright">
                        &copy; @lang('landing.footer.copyright_part_1') @lang('landing.footer.copyright_part_2') <strong><span>Nourish</span></strong>.
                    </div>
                </div>
                <div class="col-4">
                    <div class="footer-content">
                        <p>Created By</p>
                        <a href="https://convertjo.com" target="_blank">
                            <img src="{{ asset('assets/img/conv-b.png')}}" width="60" alt="ConvertJo Logo">
                        </a>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/accordions.js')}}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Global Init -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script type="text/javascript">
        var url = "{{ route('LangChange') }}";
        $(".Langchange").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });

        $(function() {
            function isLargeScreen() {
                return window.innerWidth > 992;
            }

            function updateNavbar() {
                var $nav = $(".navbar");
                if (isLargeScreen()) {
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                } else {
                    $nav.removeClass('scrolled');
                }
            }
            updateNavbar();
            $(document).scroll(updateNavbar);
            $(window).resize(updateNavbar);
        });

    </script>
    @yield('script')
</body>
</html>
