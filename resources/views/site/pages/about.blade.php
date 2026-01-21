@extends('site.base')

@section('title', $page->title . ' - Contábil & BPO Financeiro / DP / RH')

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
<!--About Three Start-->
<section class="about-three">
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
                        <p style="font-size: 16px; margin-top: 15px; color: var(--corle-base, #2563eb);"><strong>Contábil & BPO Financeiro / DP / RH</strong></p>
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
        @if($about->description_2)
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="section-title text-center">
                    <h3 class="section-title__title">Nossa Expertise</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="progress-one__progress-box">
                    <div class="progress-levels">
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Serviços Contábeis Completos</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="95">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="95"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Escrituração Fiscal</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="90">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="90"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Departamento Pessoal</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="85">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="85"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Abertura e Regularização de Empresas</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="80">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="80"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Consultoria Contábil</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="75">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="75"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <div class="inner count-box">
                                <div class="title">Tecnologia e Inovação</div>
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="92">0</span>
                                            <span class="percent">%</span>
                                        </div>
                                        <div class="bar-fill" data-percent="92"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--About Three End-->
@endif

@if(isset($teams) && $teams->count() > 0)
<!--Team Section Start-->
<section class="team-section fix section-padding">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Nossa Equipe</span>
            <h2 class="section-title__title">Conheça Nossa Equipe</h2>
            <p class="section-title__text">Equipe qualificada para cuidar do seu negócio</p>
        </div>
        <div class="row">
            @foreach($teams as $index => $team)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($index % 4) * 100 }}ms">
                <div class="team-one__single">
                    <div class="team-one__img">
                        <img src="{{ asset('storage/' . $team->thumb) }}" alt="{{ $team->name }}">
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name">{{ $team->name }}</h3>
                        @if(isset($team->role) && $team->role != '')
                        <p class="team-one__sub-title">{{ $team->role }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Team Section End-->
@endif
@endsection

@section('pageMODAL')
@endsection

@section('pageJS')
@endsection

@section('pageCSS')
@endsection
