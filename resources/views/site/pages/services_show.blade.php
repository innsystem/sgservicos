@extends('site.base')

@section('title', $service->title . ' - Contábil & BPO Financeiro / DP / RH')

@if(isset($service->description) && $service->description != '')
@section('description', Str::limit(strip_tags($service->description)))
@endif

@if(isset($service->thumb) && $service->thumb != '')
@section('image', asset('storage/'.$service->thumb))
@endif

@section('content')
<!-- Service Details Start -->
<section class="service-details-section fix section-padding" style="padding-top:160px;">
    <div class="container">
        <div class="service-details-wrapper">
            <div class="row g-5">
                <div class="col-12 col-lg-8">
                    <div class="service-details-items">
                        <div class="details-content">
                            <div class="section-title text-left">
                                <span class="section-title__tagline" style="display: block; margin-bottom: 10px; font-size: 16px; color: var(--corle-base, #2563eb);">Contábil & BPO Financeiro / DP / RH</span>
                                <h2 class="section-title__title">{{ $service->title }}</h2>
                            </div>
                            <div class="service-details__text">
                                {!! $service->description !!}
                            </div>
                        </div>
                        @if(isset($service->thumb) && $service->thumb != '')
                        <div class="service-image">
                            <img src="{{ asset('/storage/'.$service->thumb) }}" alt="{{ $service->title }}">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="widget-categories">
                                <h4 class="widget-title">Nossos Serviços</h4>
                                <ul class="list-unstyled">
                                    @foreach($getServices as $serviceItem)
                                    <li class="{{ Route::currentRouteName() == 'site.services.show' && request()->segment(2) == $serviceItem->slug ? 'active' : '' }}">
                                        <a href="{{ route('site.services.show', $serviceItem->slug) }}">
                                            <i class="icon-right-arrow-2"></i> {{ $serviceItem->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '' || isset($getSettings['cellphone']) && $getSettings['cellphone'] != '')
                        <div class="single-sidebar-widget bg-image bg-cover" style="background-image: url('{{ asset('/galerias/fotos/foto_410x332.png') }}');">
                            <div class="contact-text">
                                <div class="icon">
                                    <span class="icon-phone"></span>
                                </div>
                                <h3 class="text-white">Entre em Contato</h3>
                                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                <h3>
                                    <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" class="text-white">{{ $getSettings['telephone'] }}</a>
                                </h3>
                                @endif
                                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                <h3>
                                    <a href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" class="text-white" target="_blank">{{ $getSettings['telephone'] }}</a>
                                </h3>
                                @endif
                                <p class="mt-3 text-white">
                                    {{ $getSettings['meta_description'] ?? '' }}
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Details End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
@endsection
