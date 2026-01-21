<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title-->
    <title>{{$getSettings['site_name']}}</title>

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
    <meta name="twitter:title" content="@yield('title', $getSettings['site_name'])">
    <meta name="twitter:description" content="@yield('description', $getSettings['meta_description'])">
    <meta name="twitter:image" content="@yield('image', asset($getSettings['logo']))">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/galerias/favicon.ico?1') }}" type="image/x-icon">

    <!-- CSS here -->
    <link href="{{ asset('/tpl_site/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('/tpl_site/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/tpl_site/css/style.css?2') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/tpl_site/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/tpl_site/css/template_custom.css?2') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('/tpl_site/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">

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

    <div id="wrapper">

        <a href="#" id="back-to-top"></a>

        <!-- page preloader begin -->
        <div id="de-loader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        <header class="transparent header-light header-float">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-inner">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="{{ url('/') }}">
                                            <img class="logo-main" src="{{ asset('/galerias/logo_sg.png') }}" alt="Logomarca SG Serviços">
                                            <img class="logo-scroll" src="{{ asset('/galerias/logo_sg.png') }}" alt="Logomarca SG Serviços">
                                            <img class="logo-mobile" src="{{ asset('/galerias/logo_sg.png') }}" alt="Logomarca SG Serviços">
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>

                                <div class="de-flex-col">
                                    <div class="de-flex-col header-col-mid">
                                        <ul id="mainmenu">
                                            <li><a class="menu-item" href="{{ url('/#inicio') }}">Início</a></li>
                                            <li><a class="menu-item" href="{{ url('/#sobre') }}">Sobre</a></li>
                                            @if(isset($menuSpecialties) && $menuSpecialties->count() > 0)
                                            <li><a class="menu-item" href="{{ url('/#especialidades') }}">Especialidades</a>
                                                <ul>
                                                    @foreach($menuSpecialties as $specialty)
                                                    <li><a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}">{{ $specialty->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><a class="menu-item" href="{{ url('/#especialidades') }}">Especialidades</a></li>
                                            @endif
                                            @if(isset($menuExams) && $menuExams->count() > 0)
                                            <li><a class="menu-item" href="{{ url('/#exames') }}">Exames</a>
                                                <ul>
                                                    @foreach($menuExams as $exam)
                                                    <li><a href="{{ url('/#exames') }}">{{ $exam->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><a class="menu-item" href="{{ url('/#exames') }}">Exames</a></li>
                                            @endif
                                            <li><a class="menu-item" href="{{ url('/#faq') }}">FAQ</a></li>
                                            <li><a class="menu-item" href="{{ url('/contato') }}">Contato</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="de-flex-col">
                                    <a class="btn-main fx-slide w-100" href="{{ url('/contato') }}"><span>Agende sua consulta</span></a>
                                    <div class="menu_side_area">
                                        <span id="menu-btn"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->

        <main>
            <div id="top"></div>

            @yield('content')
        </main>


        @if(isset($getSettings['whatsapp']) && $getSettings['whatsapp'] != '')
        <div class="whatsapp_futuante pulsaDelay animate__animated animate__tada">
            <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['whatsapp']) }}" target="_Blank"><i class="fab fa-whatsapp"></i></a>
        </div>
        @endif


        <!-- footer begin -->
        <footer class="section-dark">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4 col-sm-6">
                        <img src="{{ asset('/galerias/logo_sg_branco.png') }}" class="logo-footer" alt="Logomarca SG Serviços">
                        <div class="spacer-20"></div>
                        @if(isset($getSettings['meta_description']) && $getSettings['meta_description'] != '')
                        <p>{!! nl2br(e($getSettings['meta_description'])) !!}</p>
                        @endif

                        <div class="social-icons mb-sm-30">
                            @if(isset($getSettings['facebook']) && $getSettings['facebook'] != '')
                            <a href="{{ $getSettings['facebook'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if(isset($getSettings['twitter']) && $getSettings['twitter'] != '')
                            <a href="{{ $getSettings['twitter'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
                            @endif
                            @if(isset($getSettings['whatsapp']) && $getSettings['whatsapp'] != '')
                            <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['whatsapp']) }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
                            @endif
                            @if(isset($getSettings['instagram']) && $getSettings['instagram'] != '')
                            <a href="{{ $getSettings['instagram'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if(isset($getSettings['youtube']) && $getSettings['youtube'] != '')
                            <a href="{{ $getSettings['youtube'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="widget">
                                    <h5>Especialidades</h5>
                                    <ul>
                                        <li><a href="{{ url('/#especialidades') }}">Oftalmologia Geral</a></li>
                                        <li><a href="{{ url('/#especialidades') }}">Cirurgia de Catarata</a></li>
                                        <li><a href="{{ url('/#especialidades') }}">Cirurgia Refrativa</a></li>
                                        <li><a href="{{ url('/#especialidades') }}">Retina e Vítreo</a></li>
                                        <li><a href="{{ url('/#especialidades') }}">Glaucoma</a></li>
                                        <li><a href="{{ url('/#especialidades') }}">Oftalmoplástica</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="widget">
                                    <h5>Exames</h5>
                                    <ul>
                                        <li><a href="{{ url('/#exames') }}">Mapeamento de Retina</a></li>
                                        <li><a href="{{ url('/#exames') }}">Tonometria de Aplanação</a></li>
                                        <li><a href="{{ url('/#exames') }}">Paquimetria</a></li>
                                        <li><a href="{{ url('/#exames') }}">Ceratoscopia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                        <div class="widget">
                            <h5>Contato</h5>
                            <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color"></i>Unidade Sede</div>
                            <div class="text-white">
                                @if(isset($getSettings['address']) && trim($getSettings['address']) !== '')
                                {!! nl2br(e($getSettings['address'])) !!}
                                @endif
                            </div>

                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-phone me-2 id-color"></i>Fale Conosco</div>
                            <div class="text-white small">
                                @php
                                $phoneFields = [
                                'telephone' => 'Recepção',
                                'telephone_fixo' => 'Recepção (Fixo)',
                                'cellphone' => 'Financeiro',
                                'cellphone_other' => 'Relacionamento',
                                ];
                                @endphp
                                @foreach($phoneFields as $field => $label)
                                @if(isset($getSettings[$field]) && trim($getSettings[$field]) !== '')
                                <div class="mb-1 d-flex align-items-center gap-2">
                                    <span class="text-muted d-block">{{ $label }}</span>
                                    <a href="tel:{{ preg_replace('/\D/', '', $getSettings[$field]) }}" class="text-white">
                                        {{ $getSettings[$field] }}
                                    </a>
                                </div>
                                @endif
                                @endforeach

                                @if(isset($getSettings['whatsapp']) && $getSettings['whatsapp'] != '')
                                <div class="mb-1 d-flex align-items-center gap-2">
                                    <span class="text-muted d-block">WhatsApp</span>
                                    <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['whatsapp']) }}" target="_blank" class="text-white">
                                        {{ $getSettings['whatsapp'] }}
                                    </a>
                                </div>
                                @endif
                            </div>

                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color"></i>Envie uma mensagem</div>
                            @if(isset($getSettings['email']) && $getSettings['email'] != '')
                            <a href="mailto:{{ $getSettings['email'] }}" class="text-white">{{ $getSettings['email'] }}</a>
                            @else
                            contato@sgservicos.com.br
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    &copy; {{ date('Y') }} - {{ $getSettings['site_name'] }}. <br class="d-block d-md-none"> Todos os direitos reservados.
                                </div>
                                <ul class="menu-simple">
                                    <span class="developers">Desenvolvido por <a href="https://kiwimidia.com" target="_Blank"><img data-src="{{ asset('/logo_kiwimidia_branco.png') }}" class="" loading="lazy" style="width:80px;" alt="Kiwimídia" src="{{ asset('/logo_kiwimidia_branco.png') }}"></a></span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->

        @yield('pageMODAL')

    </div>

    <!-- JS here -->
    <script src="{{ asset('/tpl_site/js/plugins.js') }}"></script>
    <script src="{{ asset('/tpl_site/js/designesia.js') }}"></script>

    <!-- Close mobile menu on anchor link click and scroll -->
    <script>
        (function($) {
            'use strict';

            // Flag para controlar se estamos processando um clique em link
            var isProcessingClick = false;
            var menuJustOpened = false;
            var isClosingMenu = false;

            // Função para fechar o menu mobile usando trigger de clique no botão
            function closeMobileMenu() {
                var $header = $('header');
                var $menuBtn = $('#menu-btn');

                // Verificar se o menu está aberto e não estamos já fechando
                if ($header.hasClass('menu-open') && !isClosingMenu) {
                    isClosingMenu = true;

                    // Usar trigger de clique no botão para manter o estado sincronizado
                    $menuBtn[0].click();

                    // Resetar flag após um pequeno delay
                    setTimeout(function() {
                        isClosingMenu = false;
                    }, 100);
                }
            }

            // Detectar cliques em links de âncora no menu mobile e scroll
            $(document).ready(function() {
                // Aguardar um pouco para garantir que o designesia.js foi carregado
                setTimeout(function() {
                    // Detectar quando o menu é aberto (para evitar fechar imediatamente)
                    $(document).on('click', '#menu-btn', function() {
                        // Se não estamos fechando programaticamente, marcar como aberto
                        if (!isClosingMenu) {
                            menuJustOpened = true;
                            setTimeout(function() {
                                menuJustOpened = false;
                            }, 500);
                        }
                    });

                    // Detectar cliques em links do menu que contêm âncoras
                    // Usar capture phase para executar ANTES do evento de navegação
                    $(document).on('click', '#mainmenu a[href*="#"]', function(e) {
                        var href = $(this).attr('href');
                        var $header = $('header');
                        var $link = $(this);

                        // Verificar se é um link de âncora (não é uma página externa)
                        if (href.indexOf('#') !== -1 && href.indexOf('http') === -1 && href.indexOf('mailto:') === -1) {
                            // Verificar se estamos em modo mobile (menu aberto)
                            if ($header.hasClass('menu-open')) {
                                // Prevenir o comportamento padrão temporariamente
                                e.preventDefault();
                                e.stopPropagation();

                                // Marcar que estamos processando um clique
                                isProcessingClick = true;

                                // Fechar o menu IMEDIATAMENTE
                                closeMobileMenu();

                                // Aguardar um frame para garantir que o menu fechou
                                requestAnimationFrame(function() {
                                    requestAnimationFrame(function() {
                                        // Agora permitir a navegação
                                        var targetId = href.split('#')[1];
                                        var $target = $('#' + targetId);

                                        if ($target.length) {
                                            $('html, body').animate({
                                                scrollTop: $target.offset().top - 100
                                            }, 500);
                                        } else {
                                            // Fallback: permitir navegação normal
                                            window.location.href = href;
                                        }

                                        // Resetar a flag após um tempo
                                        setTimeout(function() {
                                            isProcessingClick = false;
                                        }, 800);
                                    });
                                });

                                return false;
                            }
                        }
                    });

                    // Detectar scroll e fechar o menu mobile
                    // Mas não fechar se acabamos de abrir o menu ou clicar em um link
                    var scrollTimer = null;
                    $(window).on('scroll', function() {
                        // Verificar se o menu está aberto, não acabamos de abrir e não estamos processando um clique
                        if ($('header').hasClass('menu-open') && !isProcessingClick && !menuJustOpened && !isClosingMenu) {
                            // Usar debounce para evitar múltiplas chamadas
                            clearTimeout(scrollTimer);
                            scrollTimer = setTimeout(function() {
                                closeMobileMenu();
                            }, 150);
                        }
                    });
                }, 500);
            });
        })(jQuery);
    </script>

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