@extends('site.base')

@section('title', $page->title)

@section('content')
@php
    $statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
    if (!$statusEnabled) {
        $statusEnabled = \App\Models\Status::where('type', 'default')->first();
    }
    $statusId = $statusEnabled ? $statusEnabled->id : null;
    $about = \App\Models\About::when($statusId, function($query) use ($statusId) {
        return $query->where('status', $statusId);
    })->orderBy('sort_order', 'ASC')->first();
@endphp

@if($about)
<section class="relative">
    <div class="gradient-edge-top color op-3"></div>
    <div class="gradient-edge-bottom color op-3"></div>
    <div class="container relative z-2">
        <div class="row gy-4 gx-5">
            <div class="col-lg-6">
                <div class="me-lg-3">
                    @if($about->subtitle)
                    <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s">{{ $about->subtitle }}</div>
                    @endif
                    <h2 class="split" data-wow-delay=".2s">{{ $about->title }}</h2>
                    @if($about->description)
                    <p class="wow fadeInUp" data-wow-delay=".4s">{{ $about->description }}</p>
                    @endif
                    @if($about->features && count($about->features) > 0)
                    <ul class="ul-check text-dark cols-2 fw-600 mb-4 wow fadeInUp" data-wow-delay=".6s">
                        @foreach($about->features as $feature)
                        @if(!empty($feature))
                        <li>{{ $feature }}</li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    @if($about->button_text && $about->button_link)
                    <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s" href="{{ $about->button_link }}"><span>{{ $about->button_text }}</span></a>
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
        @if($about->description_2)
        <div class="spacer-double"></div>
        <div class="row g-4">
            <div class="col-lg-12">
                <h3 class="mb-0">Our Expertise</h3>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0s">
                <div class="skill-bar style-2">
                    <h5>Comprehensive Eye Exams</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="95%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="skill-bar style-2">
                    <h5>Vision Correction & Glasses</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="90%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="skill-bar style-2">
                    <h5>Contact Lens Fitting</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="85%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="skill-bar style-2">
                    <h5>Pediatric Eye Care</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="80%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.8s">
                <div class="skill-bar style-2">
                    <h5>Dry Eye Treatment</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="75%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="1s">
                <div class="skill-bar style-2">
                    <h5>Advanced Diagnostic Technology</h5>
                    <div class="de-progress">
                        <div class="value"></div>
                        <div class="progress-bar" data-value="92%"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif

@if(isset($teams) && $teams->count() > 0)
<section class="team-section fix section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="wow fadeInUp">
                Conheça nossa equipe
            </h2>
            <span class="fs-4 wow fadeInUp" data-wow-delay=".3s">Equipe qualificada para cuidar do seu bem-estar</span>
        </div>
        <div class="swiper team-slider">
            <div class="swiper-wrapper">
                @foreach($teams as $team)
                <div class="swiper-slide">
                    <div class="single-team-items">
                        <div class="team-image bg-cover" style="background-image: url('{{ asset('/storage/'.$team->thumb) }}');">
                            <div class="team-content">
                                @if(isset($team->role) && $team->role != '')
                                <p>{{$team->role}}</p>
                                @endif
                                <h3>
                                    {{$team->name}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-dot mt-5 text-center">
                <div class="dot"></div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('pageMODAL')
@endsection

@section('pageJS')
@endsection

@section('pageCSS')
@endsection