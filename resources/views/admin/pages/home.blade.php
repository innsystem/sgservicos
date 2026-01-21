@extends('admin.base')

@section('title', 'Bem-vindos')

@section('content')
<div class="container">
    <div class="py-2 gap-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">@yield('title')</h4>
        </div>
    </div>
    <div class="row mt-4">
        <!-- Cards de Recursos -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Páginas</h3>
                    <p class="card-text fs-2 fw-semibold" id="pagesCount" data-count="{{ $pagesCount ?? 0 }}">0</p>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary btn-sm">Ver Páginas</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Serviços</h3>
                    <p class="card-text fs-2 fw-semibold" id="servicesCount" data-count="{{ $servicesCount ?? 0 }}">0</p>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-primary btn-sm">Ver Serviços</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Depoimentos</h3>
                    <p class="card-text fs-2 fw-semibold" id="testimonialsCount" data-count="{{ $testimonialsCount ?? 0 }}">0</p>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary btn-sm">Ver Depoimentos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Equipes</h3>
                    <p class="card-text fs-2 fw-semibold" id="teamsCount" data-count="{{ $teamsCount ?? 0 }}">0</p>
                    <a href="{{ route('admin.teams.index') }}" class="btn btn-primary btn-sm">Ver Equipes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<script>
    function animateCounter(element, targetNumber) {
        let currentNumber = 0;
        const duration = 1000; // milliseconds
        const increment = targetNumber / (duration / 10); // Adjust 10 for smoother animation

        const timer = setInterval(() => {
            currentNumber += increment;
            if (currentNumber >= targetNumber) {
                element.textContent = targetNumber;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(currentNumber);
            }
        }, 10);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const pagesElement = document.getElementById('pagesCount');
        const servicesElement = document.getElementById('servicesCount');
        const testimonialsElement = document.getElementById('testimonialsCount');
        const teamsElement = document.getElementById('teamsCount');

        if (pagesElement) {
            animateCounter(pagesElement, parseInt(pagesElement.dataset.count));
        }
        if (servicesElement) {
            animateCounter(servicesElement, parseInt(servicesElement.dataset.count));
        }
        if (testimonialsElement) {
            animateCounter(testimonialsElement, parseInt(testimonialsElement.dataset.count));
        }
        if (teamsElement) {
            animateCounter(teamsElement, parseInt(teamsElement.dataset.count));
        }
    });
</script>
@endsection
