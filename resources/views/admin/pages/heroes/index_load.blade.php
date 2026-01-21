@if(isset($results) && count($results) > 0)
@php
$hero = $results->first();
@endphp
@include('admin.pages.heroes.form', ['result' => $hero, 'statuses' => $statuses])
@else
<div class="text-center py-5">
    <div class="mb-4">
        <i class="fas fa-image fa-4x text-muted"></i>
    </div>
    <h5 class="mb-3">Nenhum Hero configurado</h5>
    <p class="text-muted mb-4">Configure o conteúdo principal da página inicial criando um Hero.</p>
    <button type="button" class="btn btn-success button-heroes-create">
        <i class="fa fa-plus"></i> Criar Hero
    </button>
</div>
@endif

