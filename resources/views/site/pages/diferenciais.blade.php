@extends('site.base')

@section('title', 'Diferenciais')

@section('content')
<!-- Why Choose One Start -->
<section class="why-choose-one why-choose-two" style="padding-top:160px;">
    <div class="container">
        <div class="why-choose-one__top">
            <div class="row">
                <div class="col-xl-8">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">NOSSOS DIFERENCIAIS</span>
                            <h2 class="section-title__title">Queremos que nossos clientes <br> se sintam em casa</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="why-choose-one__bottom">
            <div class="row">
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="why-choose-one__single">
                        <div class="why-choose-one__icon">
                            <span class="icon-badge-rank" style="font-size: 60px;"></span>
                        </div>
                        <h3 class="why-choose-one__title">Especialistas</h3>
                        <p class="why-choose-one__text">Em cada necessidade, você será atendido por um especialista altamente capacitado.</p>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="why-choose-one__single">
                        <div class="why-choose-one__icon">
                            <span class="icon-computer" style="font-size: 60px;"></span>
                        </div>
                        <h3 class="why-choose-one__title">Atendimento Online</h3>
                        <p class="why-choose-one__text">Atendimento completo via internet, com agilidade e praticidade para resolver suas questões contábeis de onde estiver!</p>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="why-choose-one__single">
                        <div class="why-choose-one__icon">
                            <span class="icon-x-ray" style="font-size: 60px;"></span>
                        </div>
                        <h3 class="why-choose-one__title">Tecnologia Digital</h3>
                        <p class="why-choose-one__text">Utilizamos tecnologia digital e acesso direto aos sistemas dos órgãos responsáveis, agilizando todos os processos contábeis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose One End -->

<!-- Gallery Section Start -->
<section class="gallery-section fix section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="swiper testimonial-slider-2 wow fadeInUp" data-wow-delay=".5s">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_1.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_2.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_3.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_4.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_5.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_6.png') }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('/galerias/fotos/slide_7.png') }}" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            const gallerySlider = document.querySelector('.testimonial-slider-2');
            if (gallerySlider) {
                new Swiper(gallerySlider, {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
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
                            slidesPerView: 4,
                            spaceBetween: 40,
                        },
                    },
                });
            }
        }
    });
</script>
@endsection
