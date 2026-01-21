@extends('site.base')

@section('title', $service->title)

@if(isset($service->description) && $service->description != '')
@section('description', Str::limit(strip_tags($service->description)))
@endif

@if(isset($service->thumb) && $service->thumb != '')
@section('image', asset('storage/'.$service->thumb))
@endif

@section('content')
<section class="service-details-section fix section-padding">
    <div class="container">
        <div class="service-details-wrapper">
            <div class="row g-5">
                <div class="col-12 col-lg-8">
                    <div class="service-details-items">
                        <div class="details-content">
                            <h1 class="h2 wow" data-splitting>@yield('title')</h1>
                            <div class="mb-0">
                                {!! $service->description !!}
                            </div>
                        </div>
                        @if(isset($service->thumb) && $service->thumb != '')
                        <div class="service-image">
                            <img src="{{ asset('/storage/'.$service->thumb) }}" alt="@yield('title')">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="widget-categories">
                                <ul>
                                    @foreach($getServices as $service)
                                    <li class="{{ Route::currentRouteName() == 'site.services.show' && request()->segment(2) == $service->slug ? 'active' : '' }}" onclick="javascript:location.href=`{{ route('site.services.show', $service->slug) }}`;"><i class="fas fa-chevron-circle-right me-3"></i> <a href="{{ route('site.services.show', $service->slug) }}">{{$service->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '' || isset($getSettings['cellphone']) && $getSettings['cellphone'] != '')
                        <div class="single-sidebar-widget bg-image bg-cover" style="background-image: url('{{ asset('/galerias/fotos/foto_410x332.png') }}');">
                            <div class="contact-text">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <h3 class="text-white">Entre em Contato</h3>
                                @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                                <h3>
                                    <a href="tel:{{ $getSettings['telephone'] }}">{{ $getSettings['telephone'] }}</a>
                                </h3>
                                @endif
                                @if(isset($getSettings['cellphone']) && $getSettings['cellphone'] != '')
                                <h3>
                                    <a href="https://api.whatsapp.com/send/?phone=55{{ $getSettings['cellphone'] }}">{{ $getSettings['cellphone'] }}</a>
                                </h3>
                                @endif
                                <p class="mt-3">
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
@endsection