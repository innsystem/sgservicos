@if(isset($results) && count($results) > 0)
@foreach($results as $specialty)
<div id="row_specialty_{{$specialty->id}}" class="col-12 pb-2 mb-4 border-bottom rounded">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div>
            @if($specialty->image)
            <img src="{{ asset('storage/' . $specialty->image) }}" alt="{{ $specialty->title }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
            @else
            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 4px;">
                <i class="fas fa-image text-muted"></i>
            </div>
            @endif
        </div>
        <div class="flex-grow-1 d-flex align-items-center">
            <div>
                <h5 class="h6 mb-1 fw-bold">{{$specialty->title}}</h5>
                @if($specialty->description)
                <small class="text-muted">{{ Str::limit($specialty->description, 100) }}</small>
                @endif
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-info button-specialties-edit" data-specialty-id="{{$specialty->id}}">Editar</button>
            <button type="button" class="btn btn-sm btn-danger button-specialties-delete" data-specialty-id="{{$specialty->id}}" data-specialty-name="{{$specialty->title}}">Apagar</button>
        </div>
    </div>
</div><!-- col-12 -->
@endforeach
@else
<div class="alert alert-warning mb-0">Nenhum resultado foi localizado...</div>
@endif

