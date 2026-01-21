@if(isset($results) && count($results) > 0)
@foreach($results as $permission)
<div id="row_permission_{{$permission->id}}" class="col-12 pb-1 mb-2 border-bottom rounded">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div class="flex-grow-1 d-flex align-items-center">
            <div>
                <h5 class="h5 mb-1 fw-bold">{{$permission->title}}</h5>
                <p class="fs-6 text-muted mb-0">{{$permission->key}}</p>
            </div>
        </div>
    </div>
</div><!-- col-12 -->
@endforeach
@else
<div class="alert alert-warning mb-0">Nenhum resultado foi localizado...</div>
@endif