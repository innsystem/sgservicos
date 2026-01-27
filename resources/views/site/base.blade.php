<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', $getSettings['site_name']) - SG Serviços</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/galerias/favicon.ico?1') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/galerias/favicon.ico?1') }}" />
    <link rel="shortcut icon" href="{{ asset('/galerias/favicon.ico?1') }}" type="image/x-icon" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (OG) Meta Tags -->
    <meta property="og:title" content="@yield('title', $getSettings['site_name'])">
    <meta property="og:description" content="@yield('description', $getSettings['meta_description'])">
    <meta property="og:image" content="@yield('image', asset('/galerias/facebook_nascimento_odontologia.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{$getSettings['site_name']}}">
    <meta property="og:locale" content="pt_BR">

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="@yield('keywords', $getSettings['meta_keywords'])">
    <meta name="description" content="@yield('description', $getSettings['meta_description'])">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $getSettings['site_name']) - Contábil & BPO Financeiro / DP / RH">
    <meta name="twitter:description" content="@yield('description', $getSettings['meta_description'])">
    <meta name="twitter:image" content="@yield('image', asset($getSettings['logo']))">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/corle-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/gordita-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/vendors/nice-select/nice-select.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('/tpl_site/css/corle.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/css/corle-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl_site/css/color-3.css') }}" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/tpl_site/css/template_custom.css?1') }}" />

    <!-- SwalFire -->
    <link href="{{ asset('/plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('pageCSS')

    @if(isset($getSettings['script_head']) && $getSettings['script_head'] != '')
    {!! $getSettings['script_head'] !!}
    @endif
</head>

<body>
    @if(isset($getSettings['script_body']) && $getSettings['script_body'] != '')
    {!! $getSettings['script_body'] !!}
    @endif

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        <header class="main-header-three">
            <div class="main-header-three__top">
                <div class="main-header-three__top-wrapper">
                    <div class="main-header-three__top-inner">
                        <div class="main-header-three__top-left">
                            <div class="main-header-three__location-box">
                                <div class="main-header-three__location-icon">
                                    <span class="icon-location1"></span>
                                </div>
                                <p class="main-header-three__location-text">
                                    @if(isset($getSettings['address']) && trim($getSettings['address']) !== '')
                                        {{ strip_tags($getSettings['address']) }}
                                    @else
                                        Endereço não informado
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="main-header-three__top-right">
                            <ul class="main-header-three__contact-list list-unstyled">
                                @if(isset($getSettings['email']) && $getSettings['email'] != '')
                                <li>
                                    <div class="icon">
                                        <span class="icon-email-3"></span>
                                    </div>
                                    <div class="content">
                                        <h4><a href="mailto:{{ $getSettings['email'] }}">{{ $getSettings['email'] }}</a></h4>
                                    </div>
                                </li>
                                @endif
                                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone"></span>
                                    </div>
                                    <div class="content">
                                        <h4><a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}">{{ $getSettings['telephone'] }}</a></h4>
                                    </div>
                                </li>
                                @endif
                            </ul>
                            <div class="main-header-three__social">
                                <p class="main-header-three__social-text">Redes Sociais</p>
                                @if(isset($getSettings['linkedin']) && $getSettings['linkedin'] != '')
                                <a href="{{ $getSettings['linkedin'] }}" target="_blank" rel="noopener noreferrer"><span class="icon-linkedin"></span></a>
                                @endif
                                @if(isset($getSettings['twitter']) && $getSettings['twitter'] != '')
                                <a href="{{ $getSettings['twitter'] }}" target="_blank" rel="noopener noreferrer"><span class="icon-twitter"></span></a>
                                @endif
                                @if(isset($getSettings['facebook']) && $getSettings['facebook'] != '')
                                <a href="{{ $getSettings['facebook'] }}" target="_blank" rel="noopener noreferrer"><span class="icon-facebook"></span></a>
                                @endif
                                @if(isset($getSettings['instagram']) && $getSettings['instagram'] != '')
                                <a href="{{ $getSettings['instagram'] }}" target="_blank" rel="noopener noreferrer"><span class="icon-instagram"></span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="main-menu main-menu-three">
                <div class="main-menu-three__wrapper">
                    <div class="main-menu-three__wrapper-inner">
                        <div class="main-menu-three__left">
                            <div class="main-menu-three__logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('/galerias/logo_dark.png') }}" alt="{{ $getSettings['site_name'] }}"></a>
                            </div>
                            <div class="main-menu-three__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="{{ url('/#inicio') }}">Início</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/#sobre') }}">Sobre</a>
                                    </li>
                                    @if(isset($menuSpecialties) && $menuSpecialties->count() > 0)
                                    <li class="dropdown">
                                        <a href="{{ url('/#especialidades') }}">Especialidades</a>
                                        <ul>
                                            @foreach($menuSpecialties as $specialty)
                                            <li><a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}">{{ $specialty->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ url('/#especialidades') }}">Especialidades</a>
                                    </li>
                                    @endif
                                    @if(isset($menuExams) && $menuExams->count() > 0)
                                    <li class="dropdown">
                                        <a href="{{ url('/#servicos') }}">Serviços</a>
                                        <ul>
                                            @foreach($menuExams as $exam)
                                            <li><a href="{{ url('/#servicos') }}">{{ $exam->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ url('/#servicos') }}">Serviços</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('/#faq') }}">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/contato') }}">Contato</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu-three__right">
                            <div class="main-menu-three__consultant-box">
                                <p class="main-menu-three__consultant-text"> <span class="icon-idea-3"></span> Agende sua consulta</p>
                                <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" class="main-menu-three__consultant-btn" target="_blank">Consultar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu main-menu-three">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        @yield('content')

        @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
        <div class="whatsapp_futuante pulsaDelay animate__animated animate__tada">
            <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" target="_Blank"><i class="fab fa-whatsapp"></i></a>
        </div>
        @endif

        <!--Site Footer Two Start-->
        <footer class="site-footer-two">
            <div class="site-footer__shape-1 float-bob-x">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-shape-1.png') }}" alt="">
            </div>
            <div class="site-footer__shape-2 img-bounce">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-two-shape-1.png') }}" alt="">
            </div>
            <div class="site-footer__shape-3 float-bob-y">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-shape-3.png') }}" alt="">
            </div>
            <div class="site-footer__shape-4 img-bounce">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-two-shape-2.png') }}" alt="">
            </div>
            <div class="site-footer__shape-5 float-bob-x">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-shape-5.png') }}" alt="">
            </div>
            <div class="site-footer__shape-6 float-bob-y">
                <img src="{{ asset('/tpl_site/images/shapes/site-footer-shape-6.png') }}" alt="">
            </div>
            <div class="site-footer-two__bg-one" style="background-image: url({{ asset('/galerias/fotos/site-footer-two-bg.jpg') }});"></div>
            <div class="site-footer-two__bg-two" style="background-image: url({{ asset('/galerias/fotos/site-footer-two-bg-2.jpg') }});"></div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget-two__about">
                                <div class="footer-widget-two__logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('/galerias/logo_colorida.png') }}" alt="{{ $getSettings['site_name'] }}"></a>
                                </div>
                                <p class="footer-widget-two__about-text">
                                    @if(isset($getSettings['meta_description']) && $getSettings['meta_description'] != '')
                                        {{ strip_tags($getSettings['meta_description']) }}
                                    @else
                                        Informações sobre {{ $getSettings['site_name'] }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget-two__latest-post">
                                <div class="footer-widget-two__title-box">
                                    <h4 class="footer-widget-two__title">Especialidades</h4>
                                </div>
                                <ul class="footer-widget-two__explore-list list-unstyled">
                                    @if(isset($specialties) && $specialties->count() > 0)
                                        @foreach($specialties as $specialty)
                                        <li><a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}">{{ $specialty->title }}</a></li>
                                        @endforeach
                                    @elseif(isset($menuSpecialties) && $menuSpecialties->count() > 0)
                                        @foreach($menuSpecialties as $specialty)
                                        <li><a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}">{{ $specialty->title }}</a></li>
                                        @endforeach
                                    @endif
                                    @if(isset($exams) && $exams->count() > 0)
                                        @foreach($exams->take(3) as $exam)
                                        <li><a href="{{ url('/#especialidades') }}">{{ $exam->title }}</a></li>
                                        @endforeach
                                    @elseif(isset($menuExams) && $menuExams->count() > 0)
                                        @foreach($menuExams->take(3) as $exam)
                                        <li><a href="{{ url('/#especialidades') }}">{{ $exam->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer-widget-two__newsletter">
                                <div class="footer-widget-two__title-box">
                                    <h4 class="footer-widget-two__title">Contato</h4>
                                </div>
                                <p class="footer-widget-two__newsletter-text">Entre em contato conosco</p>
                                <div class="footer-widget-two__contact-info">
                                    @if(isset($getSettings['address']) && trim($getSettings['address']) !== '')
                                    <p class="footer-widget-two__contact-item">
                                        <span class="icon-location-filled-1"></span>
                                        {!! nl2br(e($getSettings['address'])) !!}
                                    </p>
                                    @endif
                                    @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                    <p class="footer-widget-two__contact-item">
                                        <span class="icon-phone"></span>
                                        <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}">{{ $getSettings['telephone'] }}</a>
                                    </p>
                                    @endif
                                    @if(isset($getSettings['email']) && $getSettings['email'] != '')
                                    <p class="footer-widget-two__contact-item">
                                        <span class="icon-email-3"></span>
                                        <a href="mailto:{{ $getSettings['email'] }}">{{ $getSettings['email'] }}</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__social">
                                    <p class="site-footer__social-tag">Social</p>
                                    <ul class="site-footer__social-box list-unstyled">
                                        @if(isset($getSettings['facebook']) && $getSettings['facebook'] != '')
                                        <li>
                                            <a href="{{ $getSettings['facebook'] }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        @if(isset($getSettings['twitter']) && $getSettings['twitter'] != '')
                                        <li>
                                            <a href="{{ $getSettings['twitter'] }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if(isset($getSettings['pinterest']) && $getSettings['pinterest'] != '')
                                        <li>
                                            <a href="{{ $getSettings['pinterest'] }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-pinterest-p"></i></a>
                                        </li>
                                        @endif
                                        @if(isset($getSettings['instagram']) && $getSettings['instagram'] != '')
                                        <li>
                                            <a href="{{ $getSettings['instagram'] }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        @endif
                                        @if(isset($getSettings['linkedin']) && $getSettings['linkedin'] != '')
                                        <li>
                                            <a href="{{ $getSettings['linkedin'] }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <p class="site-footer__bottom-text">&copy; {{ date('Y') }} {{ $getSettings['site_name'] }}. Todos os direitos reservados. | Desenvolvido por <a href="https://innsystem.com.br" target="_blank">InnSystem.com.br</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer Two End-->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ url('/') }}" aria-label="logo image"><img src="{{ asset('/galerias/logo_dark.png') }}" width="150" alt="{{ $getSettings['site_name'] }}" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                @if(isset($getSettings['email']) && $getSettings['email'] != '')
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $getSettings['email'] }}">{{ $getSettings['email'] }}</a>
                </li>
                @endif
                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}">{{ $getSettings['telephone'] }}</a>
                </li>
                @endif
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    @if(isset($getSettings['twitter']) && $getSettings['twitter'] != '')
                    <a href="{{ $getSettings['twitter'] }}" target="_blank" rel="noopener noreferrer" class="fab fa-twitter"></a>
                    @endif
                    @if(isset($getSettings['facebook']) && $getSettings['facebook'] != '')
                    <a href="{{ $getSettings['facebook'] }}" target="_blank" rel="noopener noreferrer" class="fab fa-facebook-square"></a>
                    @endif
                    @if(isset($getSettings['pinterest']) && $getSettings['pinterest'] != '')
                    <a href="{{ $getSettings['pinterest'] }}" target="_blank" rel="noopener noreferrer" class="fab fa-pinterest-p"></a>
                    @endif
                    @if(isset($getSettings['instagram']) && $getSettings['instagram'] != '')
                    <a href="{{ $getSettings['instagram'] }}" target="_blank" rel="noopener noreferrer" class="fab fa-instagram"></a>
                    @endif
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    @yield('pageMODAL')

    <!-- Vendor JS -->
    <script src="{{ asset('/tpl_site/vendors/jquery/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/sidebar-content/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('/tpl_site/vendors/nice-select/jquery.nice-select.min.js') }}"></script>

    <!-- template js -->
    <script src="{{ asset('/tpl_site/js/corle.js') }}"></script>

    <!-- Others Js -->
    <script src="{{ asset('/plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/plugins/jquery.mask.js') }}"></script>
    <script src="{{ asset('/plugins/jquery.mask.templates.js') }}"></script>

    @yield('pageJS')

    <!-- Img Lazy Load -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll('img.lazy-load');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute('data-src'); // Defina o src com o valor de data-src
                        img.classList.remove('lazy-load'); // Remova a classe de lazy-load
                        observer.unobserve(img); // Pare de observar a imagem
                    }
                });
            }, {
                threshold: 0.1 // A imagem será carregada quando 10% da sua área for visível
            });

            images.forEach(image => {
                observer.observe(image); // Comece a observar as imagens
            });
        });
    </script>
</body>

</html>