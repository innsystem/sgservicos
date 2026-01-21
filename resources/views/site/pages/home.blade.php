@extends('site.base')

@section('title', 'Home - Contábil & BPO Financeiro / DP / RH')

@section('content')

@php
    // Imagens padrão como fallback (tentar storage/fotos primeiro, depois template original)
    $defaultImages = [
        file_exists(public_path('storage/fotos/main-slider-3-1.jpg')) ? asset('/storage/fotos/main-slider-3-1.jpg') : asset('/tpl_site/images/backgrounds/main-slider-3-1.jpg'),
        file_exists(public_path('storage/fotos/main-slider-3-2.jpg')) ? asset('/storage/fotos/main-slider-3-2.jpg') : asset('/tpl_site/images/backgrounds/main-slider-3-2.jpg'),
        file_exists(public_path('storage/fotos/main-slider-3-3.jpg')) ? asset('/storage/fotos/main-slider-3-3.jpg') : asset('/tpl_site/images/backgrounds/main-slider-3-3.jpg')
    ];
    
    // Se não houver sliders, criar slides padrão
    if (!isset($sliders) || $sliders->count() == 0) {
        $whatsappLink = isset($getSettings['telephone']) && $getSettings['telephone'] != '' 
            ? 'https://api.whatsapp.com/send/?phone=55' . preg_replace('/\D/', '', $getSettings['telephone'])
            : 'https://api.whatsapp.com/send/?phone=5541998602603';
        
        $sliders = collect([
            (object)[
                'title' => 'Soluções Contábeis Eficientes e Confiáveis',
                'image' => file_exists(public_path('storage/fotos/main-slider-3-1.jpg')) ? 'fotos/main-slider-3-1.jpg' : null,
                'href' => $whatsappLink,
                'target' => '_blank'
            ],
            (object)[
                'title' => 'Tranquilidade Fiscal para Sua Empresa',
                'image' => file_exists(public_path('storage/fotos/main-slider-3-2.jpg')) ? 'fotos/main-slider-3-2.jpg' : null,
                'href' => $whatsappLink,
                'target' => '_blank'
            ],
            (object)[
                'title' => 'Atendimento Online e Tecnologia de Ponta',
                'image' => file_exists(public_path('storage/fotos/main-slider-3-3.jpg')) ? 'fotos/main-slider-3-3.jpg' : null,
                'href' => $whatsappLink,
                'target' => '_blank'
            ]
        ]);
    }
@endphp

@if(isset($sliders) && $sliders->count() > 0)
<!--Main Slider Three Start-->
<section id="inicio" class="main-slider-three">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "pagination": {"el": "#main-slider-pagination", "type": "bullets", "clickable": true}, "navigation": {"nextEl": "#main-slider__swiper-button-next", "prevEl": "#main-slider__swiper-button-prev"}, "autoplay": {"delay": 5000}}'>
        <div class="swiper-wrapper">
            @foreach($sliders as $index => $slider)
            <div class="swiper-slide">
                @php
                    // Determinar a imagem do slide
                    $slideImage = null;
                    if (isset($slider->image) && $slider->image) {
                        // Se a imagem já tem 'storage/' no caminho, usar direto
                        if (strpos($slider->image, 'storage/') !== false) {
                            $slideImage = asset('/' . $slider->image);
                        } elseif (strpos($slider->image, 'fotos/') !== false || strpos($slider->image, 'sliders/') !== false) {
                            // Se começa com fotos/ ou sliders/, usar direto do storage
                            $slideImage = asset('/storage/' . $slider->image);
                        } else {
                            // Assumir que está em storage/sliders/ ou storage/fotos/
                            $slideImage = asset('storage/' . $slider->image);
                        }
                    } else {
                        // Usar imagem padrão baseada no índice
                        $defaultIndex = $index % 3;
                        $slideImage = $defaultImages[$defaultIndex] ?? $defaultImages[0];
                    }
                @endphp
                <div class="image-layer-three" style="background-image: url({{ $slideImage }});"></div>
                <div class="main-slider__shape-1" style="background-image: url({{ asset('/tpl_site/images/backgrounds/main-slider-shape-1.jpg') }});"></div>
                <div class="main-slider__shape-2 float-bob-y">
                    <img src="{{ asset('/galerias/fotos/main-slider-shape-2.png') }}" alt="">
                </div>
                <div class="main-slider__shape-3 float-bob-x">
                    <img src="{{ asset('/galerias/fotos/main-slider-shape-4.png') }}" alt="">
                </div>
                <div class="main-slider-three__overly-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-three__content">
                                <div class="main-slider-three__sub-title-box">
                                    <p class="main-slider-three__sub-title">Bem-vindo à SG Serviços</p>
                                    <p class="main-slider-three__sub-title" style="font-size: 18px; margin-top: 5px; opacity: 0.9;">Contábil & BPO Financeiro / DP / RH</p>
                                </div>
                                <h2 class="main-slider-three__title">{{ $slider->title ?? 'Soluções Contábeis Eficientes e Confiáveis' }}</h2>
                                <p class="main-slider-three__text">Oferecemos soluções contábeis eficientes, personalizadas e acessíveis, simplificando processos e garantindo tranquilidade fiscal para nossos clientes.</p>
                                @if(isset($slider->href) && $slider->href)
                                <div class="main-slider-three__btn-box">
                                    <a href="{{ $slider->href }}" class="thm-btn main-slider-three__btn-1" target="{{ $slider->target ?? '_self' }}">Entre em Contato</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination" id="main-slider-pagination"></div>
        <div class="main-slider-three__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow1"></i>
            </div>
        </div>
    </div>
</section>
<!--Main Slider Three End-->
@endif

@if(isset($specialties) && $specialties->count() > 0)
<!--CTA Two Start-->
<section class="cta-two cta-two--three">
    <div class="cta-two__shape-1">
        <img src="{{ asset('/galerias/fotos/cta-two---three-shape-1.png') }}" alt="">
    </div>
    <div class="cta-two__shape-2">
        <img src="{{ asset('/galerias/fotos/cta-two---three-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="cta-two__inner">
            <div class="cta-two__title-box">
                <h3 class="cta-two__title">Soluções Contábeis Completas</h3>
                <p class="cta-two__text" style="font-size: 16px; margin-bottom: 10px;"><strong>Contábil & BPO Financeiro / DP / RH</strong></p>
                <p class="cta-two__text">Oferecemos serviços contábeis especializados para sua empresa com tecnologia de ponta.</p>
            </div>
            <div class="cta-two__btn-box">
                <a href="{{ url('/#especialidades') }}" class="thm-btn cta-two__btn">Ver Todas as Especialidades</a>
            </div>
        </div>
    </div>
</section>
<!--CTA Two End-->

<!--Services two Start-->
<section id="especialidades" class="services-two services-three">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Nossas Especialidades</span>
            <h2 class="section-title__title">O Que Oferecemos</h2>
            <p style="font-size: 16px; margin-top: 15px; color: var(--corle-base, #2563eb);"><strong>Contábil & BPO Financeiro / DP / RH</strong></p>
        </div>
        <div class="row">
            @foreach($specialties as $index => $specialty)
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ ($index % 4) * 100 }}ms">
                <div class="services-two__single">
                    <div class="services-two__arrow-box">
                        <div class="services-two__arrow-shape-1">
                            <img src="{{ asset('/galerias/fotos/services-two-shape-1.png') }}" alt="">
                        </div>
                        <a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}" class="services-two__arrow">
                            <span class="icon-right-arrow-2"></span>
                        </a>
                    </div>
                    <div class="services-two__icon">
                        @if($specialty->icon)
                        <span class="{{ $specialty->icon }}"></span>
                        @else
                        <span class="icon-seo"></span>
                        @endif
                    </div>
                    <h3 class="services-two__title">
                        <a href="{{ $specialty->link ? $specialty->link : url('/#especialidades') }}">{{ $specialty->title }}</a>
                    </h3>
                    @if($specialty->description)
                    <p class="services-two__text">{{ $specialty->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Services two End-->
@endif

@if($about)
<!--About Three Start-->
<section id="sobre" class="about-three">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-three__left">
                    <div class="about-three__img-box">
                        @if($about->image_1)
                        <div class="about-three__img-one">
                            <img src="{{ asset('storage/' . $about->image_1) }}" alt="{{ $about->title }}">
                        </div>
                        @endif
                        @if($about->image_2)
                        <div class="about-three__img-two">
                            <img src="{{ asset('storage/' . $about->image_2) }}" alt="{{ $about->title }}">
                        </div>
                        @endif
                        @if($hero && $hero->satisfied_patients_count)
                        <div class="about-three__happy-client">
                            <div class="about-three__happy-client-icon">
                                <img src="{{ asset('/galerias/fotos/about-three-icon.png') }}" alt="">
                            </div>
                            <div class="about-three__count-box count-box">
                                <h3 class="count-text" data-stop="{{ $hero->satisfied_patients_count }}" data-speed="1500">00</h3>
                                <span>+</span>
                            </div>
                            <p class="about-three__happy-client-text-1">{{ $hero->satisfied_patients_label ?? 'Clientes Satisfeitos' }}</p>
                        </div>
                        @endif
                        <div class="about-three__shape-1 zoominout"></div>
                        <div class="about-three__shape-2 float-bob-x"></div>
                        <div class="about-three__shape-3 img-bounce"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-three__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ $about->subtitle ?? 'Conheça Mais Sobre Nós' }}</span>
                        <h2 class="section-title__title">{{ $about->title }}</h2>
                    </div>
                    @if($about->description)
                    <p class="about-three__text">{{ $about->description }}</p>
                    @endif
                    @if($about->description_2)
                    <p class="about-three__text">{{ $about->description_2 }}</p>
                    @endif
                    @if($about->features && count($about->features) > 0)
                    <div class="about-three__grow-your-business">
                        <div class="about-three__grow-your-business-content">
                            <h4 class="about-three__grow-your-business-content-title">Nossos Diferenciais</h4>
                            <div class="about-three__grow-your-business-points-box">
                                <ul class="list-unstyled about-three__grow-your-business-points">
                                    @foreach($about->features as $index => $feature)
                                    @if(!empty($feature))
                                    <li>
                                        <div class="icon">
                                            <span class="icon-heavy-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $feature }}</p>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($about->button_text && $about->button_link)
                    <div class="about-three__business-start-year">
                        <div class="about-three__business-start-year-icon">
                            <span class="icon-badge-rank"></span>
                        </div>
                        <div class="about-three__business-start-year-content">
                            <a href="{{ $about->button_link }}" class="thm-btn">{{ $about->button_text }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Three End-->
@endif

@if(isset($exams) && $exams->count() > 0)
<!--How It Work Start-->
<section id="servicos" class="how-it-work how-it-work-two">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Nossos Serviços</span>
            <h2 class="section-title__title">Nossos Processos de Trabalho</h2>
        </div>
        <div class="how-it-work__bottom">
            <div class="row">
                @foreach($exams->take(3) as $index => $exam)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="{{ ($index + 1) * 100 }}ms">
                    <div class="how-it-work__single">
                        <div class="how-it-work__count"></div>
                        <div class="how-it-work__icon">
                            @if($exam->icon)
                            <span class="{{ $exam->icon }}"></span>
                            @else
                            <span class="icon-idea"></span>
                            @endif
                        </div>
                        <h3 class="how-it-work__title">{{ $exam->title }}</h3>
                        @if($exam->description)
                        <p class="how-it-work__text-2">{{ $exam->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--How It Work End-->
@endif

@if(isset($testimonials) && $testimonials->count() > 0)
<!--Testimonial Three Start-->
<section id="depoimentos" class="testimonial-two">
    <div class="container">
        <div class="section-title text-left">
            <span class="section-title__tagline">DEPOIMENTOS</span>
            <h2 class="section-title__title">O Que Nossos Clientes Dizem</h2>
        </div>
        <div class="testimonial-two__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{"items": 3, "margin": 30, "smartSpeed": 700, "loop":true, "autoplay": 6000, "nav":true, "dots":false, "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-right-arrow1\"></span>"], "responsive":{"0":{"items":1}, "768":{"items":2}, "992":{"items": 3}}}'>
            @foreach($testimonials as $testimonial)
            <div class="item">
                <div class="testimonial-two__single">
                    <div class="testimonial-two__rating-and-quote">
                        <div class="testimonial-two__rating">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <div class="testimonial-two__quote">
                            <span class="icon-bubble-message"></span>
                        </div>
                    </div>
                    <h4 class="testimonial-two__title">{{ $testimonial->name }}</h4>
                    <p class="testimonial-two__text">{{ $testimonial->content }}</p>
                    <div class="testimonial-two__client-details">
                        <div class="testimonial-two__client-img">
                            @if($testimonial->avatar)
                            <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->name }}">
                            @else
                            <img src="{{ asset('/tpl_site/images/testimonial/testimonial-2-1.jpg') }}" alt="{{ $testimonial->name }}">
                            @endif
                        </div>
                        <div class="testimonial-two__info">
                            <h3 class="testimonial-two__client-name">{{ $testimonial->name }}</h3>
                            <div class="testimonial-two__client-sub-title">{{ $testimonial->localization ?? 'Cliente' }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Testimonial Three End-->
@endif

@if(isset($faqs) && $faqs->count() > 0)
@php
    $faqsByCategory = $faqs->groupBy('category');
    $categories = $faqsByCategory->keys()->take(2);
@endphp
<!--Progress One Start-->
<section id="faq" class="progress-one">
    <div class="container">
        <h3 class="progress-one__title">Temos as Ferramentas e Expertise <br> para Ajudá-lo a Ter Sucesso</h3>
        <div class="row">
            <div class="col-xl-6">
                <div class="progress-one__left">
                    <div class="progress-one__faq">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            @foreach($categories as $categoryIndex => $category)
                                @foreach($faqsByCategory[$category] as $faqIndex => $faq)
                                <div class="accrodion {{ $categoryIndex === 0 && $faqIndex === 0 ? 'active' : '' }}">
                                    <div class="accrodion-title">
                                        <h4>{{ $faq->question }}</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="progress-one__right">
                    <div class="progress-one__img-box">
                        <div class="progress-one__img">
                            <img src="{{ asset('/galerias/fotos/progress-one-img-1.jpg') }}" alt="">
                        </div>
                        <div class="progress-one__let-get-to-work">
                                <p class="progress-one__let-get-to-work-text">
                                Temos a experiência necessária para cuidar da sua empresa.
                                <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" target="_blank">Entre em contato</a>
                            </p>
                        </div>
                        <div class="progress-one__shape-1 float-bob-x">
                            <img src="{{ asset('/galerias/fotos/progress-one-shape-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Progress One End-->
@endif

<!--Contact One Start-->
<section class="contact-one contact-two contact-three">
    <div class="contact-one__wrap">
        <div class="container">
            <div class="contact-one__inner">
                <ul class="contact-one__contact-list list-unstyled">
                    @if(isset($getSettings['address']) && trim($getSettings['address']) !== '')
                    <li>
                        <div class="icon">
                            <span class="icon-location-filled-1"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text">{!! nl2br(e($getSettings['address'])) !!}</p>
                        </div>
                    </li>
                    @endif
                    @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                    <li>
                        <div class="icon">
                            <span class="icon-phone-auricular"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text-2">Fale Conosco</p>
                            <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}">{{ $getSettings['telephone'] }}</a>
                        </div>
                    </li>
                    @endif
                    @if(isset($getSettings['email']) && $getSettings['email'] != '')
                    <li>
                        <div class="icon">
                            <span class="icon-email-3"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text-2">Envie um Email</p>
                            <a href="mailto:{{ $getSettings['email'] }}">{{ $getSettings['email'] }}</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Contact One End-->

@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<script>
    // Inicializar Swiper do slider principal
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            const mainSlider = document.querySelector('.main-slider-three .swiper-container');
            if (mainSlider) {
                const swiperOptions = JSON.parse(mainSlider.getAttribute('data-swiper-options') || '{}');
                new Swiper(mainSlider, swiperOptions);
            }
        }
    });
</script>
@endsection
