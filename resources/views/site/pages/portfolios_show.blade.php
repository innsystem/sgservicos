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
<section class="service-details-page section-space">
    <div class="small-container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="service-details-page-content">
                    <h3 class="service-details-title mb-25">@yield('title')</h3>
                    {!! $portfolio->description !!}

                    @if(isset($portfolio->images) && count($portfolio->images) > 0)
                    @foreach($portfolio->images as $portfolio_image)
                    <figure class="w-img">
                        <img src="{{ asset('/storage/'.$portfolio_image->image_path) }}" alt="@yield('title')" class="mb-25">
                    </figure>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="service-sidebar">
                    <aside>
                        <div class="service-widget-1 mb-30">
                            <h5>Nossos Serviços</h5>
                            <ul>
                                @foreach($getServices as $service)
                                <li>
                                    <a href="{{ route('site.services.show', $service->slug) }}" class="{{ Route::currentRouteName() == 'site.services.show' && request()->segment(2) == $service->slug ? 'active' : '' }}">
                                        <span>{{$service->title}}</span>
                                        <span><i class="icon-arrow-right-double"></i></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="service-widget-2 mb-30">
                            <figure class="w-img">
                                <img src="{{ asset('/galerias/servicos.png') }}" alt="">
                            </figure>
                            <div class="content bg-color-1 text-center">
                                <div class="icon-box p-relative">
                                    <i class="fal fa-phone-volume"></i>
                                </div>
                                <h5>Precisa de Orçamento?</h5>
                                <a class="pt-25 pb-25 phone" href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['cellphone']) }}">{{ $getSettings['cellphone'] }}</a>
                                <div class="btn-box">
                                    <a class="primary-btn-1 btn-hover" href="https://api.whatsapp.com/send/?phone=55{{ preg_replace('/\D/', '', $getSettings['cellphone']) }}">
                                        ENTRE EM CONTATO &nbsp; | <i class="icon-right-arrow"></i>
                                        <span style="top: 147.172px; left: 108.5px;"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection