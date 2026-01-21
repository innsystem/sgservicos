@extends('site.base')

@section('title', $portfolio->title)

@if(isset($portfolio->description) && $portfolio->description != '')
@section('description', Str::limit(strip_tags($portfolio->description)))
@endif

@if(isset($portfolio->images) && count($portfolio->images) > 0)
@php
$featuredImage = collect($portfolio->images)->firstWhere('featured', 1);
@endphp

@if($featuredImage)
@section('image', asset('storage/' . $featuredImage['image_path']))
@endif
@endif

@section('content')
<!-- Portfolio Details Start -->
<section class="service-details-page section-space" style="padding-top:160px;">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="service-details-page-content">
                    <div class="section-title text-left">
                        <h2 class="section-title__title">{{ $portfolio->title }}</h2>
                    </div>
                    <div class="portfolio-details__text">
                        {!! $portfolio->description !!}
                    </div>

                    @if(isset($portfolio->images) && count($portfolio->images) > 0)
                    <div class="portfolio-details__gallery">
                        <div class="row">
                            @foreach($portfolio->images as $portfolio_image)
                            <div class="col-md-6 mb-4">
                                <figure class="portfolio-details__img">
                                    <img src="{{ asset('/storage/'.$portfolio_image->image_path) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="service-sidebar">
                    <aside>
                        <div class="service-widget-1 mb-30">
                            <h4 class="widget-title">Nossos Serviços</h4>
                            <ul class="list-unstyled">
                                @foreach($getServices as $service)
                                <li>
                                    <a href="{{ route('site.services.show', $service->slug) }}" class="{{ Route::currentRouteName() == 'site.services.show' && request()->segment(2) == $service->slug ? 'active' : '' }}">
                                        <span>{{ $service->title }}</span>
                                        <span><i class="icon-right-arrow-2"></i></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @if(isset($getSettings['cellphone']) && $getSettings['cellphone'] != '')
                        <div class="service-widget-2 mb-30">
                            <figure class="w-img">
                                <img src="{{ asset('/galerias/servicos.png') }}" alt="">
                            </figure>
                            <div class="content bg-color-1 text-center">
                                <div class="icon-box p-relative">
                                    <span class="icon-phone"></span>
                                </div>
                                <h5>Precisa de Orçamento?</h5>
                                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                <a class="pt-25 pb-25 phone" href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" target="_blank">{{ $getSettings['telephone'] }}</a>
                                <div class="btn-box">
                                    <a class="thm-btn" href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" target="_blank">
                                        ENTRE EM CONTATO <i class="icon-right-arrow"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Details End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
@endsection
