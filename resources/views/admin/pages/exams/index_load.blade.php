@if(isset($results) && count($results) > 0)
@foreach($results as $exam)
<div id="row_exam_{{$exam->id}}" class="col-12 pb-2 mb-4 border-bottom rounded">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div>
            @if($exam->icon)
            <div class="bg-light d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                <i class="{{ $exam->icon }} text-primary fs-4"></i>
            </div>
            @else
            <div class="bg-light d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                <i class="fas fa-eye text-muted fs-4"></i>
            </div>
            @endif
        </div>
        <div class="flex-grow-1 d-flex align-items-center">
            <div>
                <h5 class="h6 mb-1 fw-bold">{{$exam->title}}</h5>
                @if($exam->description)
                <small class="text-muted">{{ Str::limit($exam->description, 100) }}</small>
                @endif
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-info button-exams-edit" data-exam-id="{{$exam->id}}">Editar</button>
            <button type="button" class="btn btn-sm btn-danger button-exams-delete" data-exam-id="{{$exam->id}}" data-exam-name="{{$exam->title}}">Apagar</button>
        </div>
    </div>
</div><!-- col-12 -->
@endforeach
@else
<div class="alert alert-warning mb-0">Nenhum resultado foi localizado...</div>
@endif

