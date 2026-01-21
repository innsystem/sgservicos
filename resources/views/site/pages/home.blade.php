@extends('site.base')

@section('content')
<section id="inicio" class="text-light jarallax relative">
    <img src="{{ $hero && $hero->background_image ? asset('storage/' . $hero->background_image) : asset('/tpl_site/images/background/1.webp') }}" class="jarallax-img" alt="">

    <div class="container relative z-2">
        <div class="row g-4">
            <div class="spacer-double"></div>
            <div class="col-lg-6">
                <h1 class="wow fadeInUp" data-wow-delay=".2s">{{ $hero && $hero->title ? $hero->title : 'Expert Vision Care and Trusted Eye Specialists' }}</h1>
                <div class="spacer-single"></div>
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
                        <p class="mb-0">{{ $hero && $hero->description ? $hero->description : 'Comprehensive eye exams with modern tools that provide accurate results while ensuring comfort and clarity for every patient.' }}</p>
                        @if($hero && $hero->button_text && $hero->button_link)
                        <a class="btn-main fx-slide mt-4" href="{{ $hero->button_link }}"><span>{{ $hero->button_text }}</span></a>
                        @endif
                    </div>
                </div>
                <div class="spacer-double sm-hide"></div>
                <div class="spacer-double sm-hide"></div>
                <div class="spacer-double sm-hide"></div>
            </div>

            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="relative me-4">
                        <img src="{{ asset('/tpl_site/images/testimonial/1.webp') }}" class="w-50px circle ms-min-10 wow fadeInRight" data-wow-delay=".8s" alt="">
                        <img src="{{ asset('/tpl_site/images/testimonial/2.webp') }}" class="w-50px circle ms-min-10 wow fadeInRight" data-wow-delay="1s" alt="">
                        <img src="{{ asset('/tpl_site/images/testimonial/3.webp') }}" class="w-50px circle ms-min-10 wow fadeInRight" data-wow-delay="1.2s" alt="">
                    </div>
                    @if($hero && $hero->satisfied_patients_count)
                    <div class="fw-600 fs-14 lh-1-5 wow fadeInRight" data-wow-delay="1.4s">
                        <span class="fs-16 fw-bold text-white">{{ $hero->satisfied_patients_count }}</span><br>
                        {{ $hero->satisfied_patients_label ? $hero->satisfied_patients_label : 'Happy Patients' }}
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @if($hero && $hero->statistics && count($hero->statistics) > 0)
    <div class="abs bottom-0 w-100 z-2 sm-hide">
        <div class="col-lg-12">
            <div class="bg-blur p-40 m-4 rounded-1">
                <div class="row g-4">
                    @foreach($hero->statistics as $index => $statistic)
                    <div class="col-md-3 col-sm-6 text-center">
                        <div class="de_count wow fadeInRight" data-wow-delay="{{ $index * 0.2 }}s">
                            <h3 class="fs-40 mb-0"><span>{{ $statistic['value'] ?? '' }}</span></h3>
                            {{ $statistic['title'] ?? '' }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="gradient-edge-bottom h-100 color"></div>
    <div class="sw-overlay op-3"></div>
</section>

@if($about)
<section id="sobre" class="relative">
    <div class="gradient-edge-top color op-3"></div>
    <div class="gradient-edge-bottom color op-3"></div>
    <div class="container relative z-2">
        <div class="row gy-4 gx-5">
            <div class="col-lg-6">
                <div class="me-lg-3">
                    @if($about->subtitle)
                    <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">{{ $about->subtitle }}</div>
                    @endif
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">{{ $about->title }}</h2>
                    @if($about->description)
                    <p class="wow fadeInUp" data-wow-delay=".2s">{{ $about->description }}</p>
                    @endif
                    @if($about->description_2)
                    <p class="wow fadeInUp" data-wow-delay=".2s">{{ $about->description_2 }}</p>
                    @endif
                    @if($about->features && count($about->features) > 0)
                    <ul class="ul-check text-dark cols-1 fw-600 mb-4 wow fadeInUp" data-wow-delay=".3s">
                        @foreach($about->features as $feature)
                        @if(!empty($feature))
                        <li>{{ $feature }}</li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    @if($about->button_text && $about->button_link)
                    <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".4s" href="{{ $about->button_link }}"><span>{{ $about->button_text }}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="relative">
                    @if($about->image_1)
                    <div class="rounded-1 w-90 overflow-hidden wow zoomIn">
                        <img src="{{ asset('storage/' . $about->image_1) }}" class="w-100 wow scaleIn" alt="">
                    </div>
                    @endif
                    @if($about->image_2)
                    <div class="rounded-1 w-50 abs mb-min-50 end-0 bottom-0 z-2 overflow-hidden shadow-soft wow zoomIn" data-wow-delay=".2s">
                        <img src="{{ asset('storage/' . $about->image_2) }}" class="w-100 wow scaleIn" data-wow-delay=".2s" alt="">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(isset($testimonials) && $testimonials->count() > 0)
<section id="depoimentos" class="bg-color-op-2 relative">
    <div class="gradient-edge-top color op-8 h-100"></div>
    <div class="container relative z-2">
        <div class="row mb-3 g-4 align-items-center justify-content-between">
            <div class="col-lg-6 text-light">
                <div class="uptitle wow fadeInUp" data-wow-delay=".0s">Depoimentos</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">O que nossos pacientes dizem</h2>
                <p class="wow fadeInUp" data-wow-delay=".2s">Do atendimento oftalmológico completo às cirurgias especializadas, nosso compromisso é cuidar de cada olhar com tecnologia, carinho e acompanhamento constante.</p>
            </div>
            <div class="col-lg-6">
                <div class="relative">
                    <div class="de-custom-nav d-flex flex-end" data-target="#testimonial-carousel">
                        <div class="d-prev circle"></div>
                        <div class="d-next circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-12">
                <div class="row">
                    <div id="testimonial-carousel" class="owl-carousel owl-theme owl-2-dots wow fadeInUp">
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="bg-white relative rounded-1 p-40">
                                <i class="fs-32 icofont-quote-left absolute start-40px id-color"></i>
                                <div class="ps-5">
                                    <p>"{{ $testimonial->content }}"</p>
                                    <div class="de-rating-ext mb-2">
                                        <span class="d-stars">
                                            @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </span>
                                        <span class="ms-2 text-white">{{ number_format($testimonial->rating, 1) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4 align-items-center">
                                @if($testimonial->avatar)
                                <img class="w-50px circle me-3" alt="{{ $testimonial->name }}" src="{{ asset('storage/' . $testimonial->avatar) }}">
                                @else
                                <img class="w-50px circle me-3" alt="{{ $testimonial->name }}" src="{{ asset('/tpl_site/images/testimonial/1.webp') }}">
                                @endif
                                <div class="mt-2">
                                    <div class="text-dark fw-bold lh-1">{{ $testimonial->name }}</div>
                                    @if($testimonial->localization)
                                    <small>{{ $testimonial->localization }}</small>
                                    @elseif($testimonial->created_at)
                                    <small>{{ $testimonial->created_at->format('d F Y') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- end carousel -->
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(isset($specialties) && $specialties->count() > 0)
<section id="especialidades" class="relative">
    <div class="container relative z-2">
        <div class="row g-4 mb-2 justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="subtitle s2 wow fadeInUp mb-2" data-wow-delay=".0s">Especialidades</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Cuidado Oftalmológico Completo</h2>
            </div>
        </div>
        <div class="row g-4">
            @foreach($specialties as $index => $specialty)
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                <div class="hover">
                    <div class="relative overflow-hidden rounded-1">
                            <div class="relative overflow-hidden rounded-1">
                                @if($specialty->image)
                                <img src="{{ asset('storage/' . $specialty->image) }}" class="w-100 hover-scale-1-2" alt="{{ $specialty->title }}">
                                @else
                                <img src="{{ asset('/tpl_site/images/services/1.webp') }}" class="w-100 hover-scale-1-2" alt="{{ $specialty->title }}">
                                @endif
                                <div class="gradient-edge-bottom color h-90 op-8"></div>
                            </div>
                        
                            <div class="p-4 relative bg-white rounded-1 mx-4 mt-min-100 z-2">
                                <h4>{{ $specialty->title }}</h4>
                                @if($specialty->description)
                                <p class="mb-0">{{ $specialty->description }}</p>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(isset($exams) && $exams->count() > 0)
<section id="exames" class="relative text-light bg-fixed-no-parallax" style="background-image: url('{{ asset('/tpl_site/images/background/2.webp') }}');">
    <div class="gradient-edge-bottom color h-100"></div>
    <div class="sw-overlay op-4"></div>
    <div class="container relative z-2">
        <div class="row g-4">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Exames oftalmológicos</div>
                <h2 class="wow fadeInUp" data-wow-delay=".2s">Diagnósticos preciso com tecnologia de ponta</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($exams->take(4) as $index => $exam)
            <div class="col-12 col-md-3 de-step {{ $index < 3 ? 'de-step-arrow' : '' }} wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                <div class="de-step-icon bg-white id-color">
                    @if($exam->icon)
                    <i class="{{ $exam->icon }} fa-2x"></i>
                    @else
                    <i class="fas fa-eye fa-2x"></i>
                    @endif
                </div>
                <h4 class="fw-bold">{{ $exam->title }}</h4>
                @if($exam->description)
                <p>{{ $exam->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(isset($faqs) && $faqs->count() > 0)
@php
    $faqsByCategory = $faqs->groupBy('category');
    $categories = $faqsByCategory->keys()->take(2);
@endphp
<section id="faq">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="subtitle id-color">FAQ</div>
                <h2>
                    Tudo o que Você Precisa Saber Sobre Cuidados Oculares
                </h2>
            </div>
            <div class="col-lg-6">
                <div class="de-tab">
                    <ul class="d-tab-nav mb-4">
                        @foreach($categories as $index => $category)
                        <li class="{{ $index === 0 ? 'active-tab' : '' }}">{{ $category }}</li>
                        @endforeach
                    </ul>
                    <ul class="d-tab-content">
                        @foreach($categories as $categoryIndex => $category)
                        <li>
                            <div class="accordion">
                                <div class="accordion-section">
                                    @foreach($faqsByCategory[$category] as $faqIndex => $faq)
                                    <div class="accordion-section-title" data-tab="#accordion-{{ $categoryIndex }}-{{ $faqIndex }}">
                                        {{ $faq->question }}
                                    </div>
                                    <div class="accordion-section-content" id="accordion-{{ $categoryIndex }}-{{ $faqIndex }}">
                                        {{ $faq->answer }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<!-- Swiper JS -->
<script src="{{ asset('/plugins/swiper/swiper-bundle.min.js') }}"></script>
<script>
    // Aguardar o Swiper estar disponível
    function initPortfolioSlider() {
        if (typeof Swiper !== 'undefined') {
            const portfolioSlider = document.querySelector('.portfolio-slider');
            if (portfolioSlider) {
                const portfolioSwiper = new Swiper('.portfolio-slider', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 40,
                        },
                    },
                    navigation: {
                        nextEl: '.array-next',
                        prevEl: '.array-prev',
                    },
                });
            }
        } else {
            // Tentar novamente após um pequeno delay
            setTimeout(initPortfolioSlider, 100);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        initPortfolioSlider();
        
        // Inicializar navegação customizada do carousel de testimonials
        if (typeof jQuery !== 'undefined' && jQuery.fn.owlCarousel) {
            var testimonialCarousel = jQuery("#testimonial-carousel");
            if (testimonialCarousel.length) {
                testimonialCarousel.owlCarousel({
                    loop: true,
                    margin: 25,
                    nav: false,
                    dots: true,
                    responsive: {
                        1000: {
                            items: 2
                        },
                        600: {
                            items: 2
                        },
                        0: {
                            items: 1
                        }
                    }
                });
                
                // Navegação customizada
                jQuery('.de-custom-nav[data-target="#testimonial-carousel"] .d-prev').on('click', function() {
                    testimonialCarousel.trigger('prev.owl.carousel');
                });
                
                jQuery('.de-custom-nav[data-target="#testimonial-carousel"] .d-next').on('click', function() {
                    testimonialCarousel.trigger('next.owl.carousel');
                });
            }
        }
    });
</script>
@endsection