@if(isset($results) && count($results) > 0)
@php
$about = $results->first();
@endphp
@include('admin.pages.abouts.form', ['result' => $about, 'statuses' => $statuses])
@else
<div class="text-center py-5">
    <div class="mb-4">
        <i class="fas fa-info-circle fa-4x text-muted"></i>
    </div>
    <h5 class="mb-3">Nenhum Sobre configurado</h5>
    <p class="text-muted mb-4">Configure a seção sobre da página inicial criando um registro.</p>
    <button type="button" class="btn btn-success button-abouts-create">
        <i class="fa fa-plus"></i> Criar Sobre
    </button>
</div>
@endif

