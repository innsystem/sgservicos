@extends('site.base')

@section('title', 'Página em Branco')

@section('content')
<!-- Blank Page Start -->
<section class="page-details" style="padding-top:160px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-details__content">
                    <h1 class="page-details__title">@yield('title')</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blank Page End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageJS')
@endsection

@section('pageCSS')
@endsection
