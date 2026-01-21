@extends('site.base')

@section('title', 'Diferenciais')

@section('content')
<!-- Service Section Start -->
<section class="service-section fix section-padding section-bg bg-cover" style="background-image: url('{{ asset('/tpl_site/img/service/bg-shape.jpg') }}');">
    <div class="bg-shape">
        <img src="{{ asset('/tpl_site/img/service/bg-shape.jpg') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="service-wrapper">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-12">
                    <div class="service-left">
                        <div class="section-title">
                            <h2 class="splt-txt wow" data-splitting>
                                Diferenciais
                            </h2>
                            <h6 class="wow fadeInUp">Queremos que nossos pacientes se sintam em casa.</h6>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="service-items mt-4">
                                    <div class="icon">
                                        <i class="fa fa-medal"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="splt-txt wow" data-splitting>
                                            Especialistas
                                        </h3>
                                        <p>
                                            Em cada necessidade, você será atendido por um especialista altamente capacitado.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                <div class="service-items">
                                    <div class="icon">
                                        <i class="fa fa-tv"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="splt-txt wow" data-splitting>
                                            TVs no Teto
                                        </h3>
                                        <p>
                                            Imagine relaxar assistindo a sua série ou vídeo favorito enquanto realiza o tratamento? Aqui, isso é possível!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                <div class="service-items mt-4">
                                    <div class="icon">
                                        <i class="fas fa-radiation"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="splt-txt wow" data-splitting>
                                            Sala de Radiografia
                                        </h3>
                                        <p>
                                            Você pode realizar sua radiografia panorâmica diretamente na nossa clínica, sem precisar se deslocar até um laboratório.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="swiper testimonial-slider-2 mt-0 mt-md-5 pt-0 pt-md-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="swiper-wrapper rounded">                            
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pageMODAL')
@endsection

@section('pageCS')
@endsection

@section('pageJS')
@endsection