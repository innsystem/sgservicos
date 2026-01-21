@extends('site.base')

@section('title', $page->title)

@section('content')
<!-- Page Details Start -->
<section class="page-details" style="padding-top:160px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-details__content">
                    <h1 class="page-details__title">{{ $page->title }}</h1>
                    <div class="page-details__text">
                        {!! $page->content !!}
                    </div>
                    <div class="page-details__btn-box">
                        <a href="{{ route('site.index') }}" class="thm-btn">Voltar ao Início</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Details End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
@endsection
