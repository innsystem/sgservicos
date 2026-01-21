@if(isset($results) && count($results) > 0)
@foreach($results as $faq)
<div id="row_faq_{{$faq->id}}" class="col-12 pb-2 mb-4 border-bottom rounded">
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div>
            <div class="bg-primary bg-opacity-10 d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                <i class="fas fa-question-circle text-primary"></i>
            </div>
        </div>
        <div class="flex-grow-1 d-flex align-items-center">
            <div>
                <h5 class="h6 mb-1 fw-bold">{{$faq->question}}</h5>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary">{{$faq->category}}</span>
                    <small class="text-muted">Ordem: {{$faq->sort_order}}</small>
                </div>
                @if($faq->answer)
                <small class="text-muted d-block">{{ Str::limit($faq->answer, 120) }}</small>
                @endif
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-info button-faqs-edit" data-faq-id="{{$faq->id}}">Editar</button>
            <button type="button" class="btn btn-sm btn-danger button-faqs-delete" data-faq-id="{{$faq->id}}" data-faq-name="{{$faq->question}}">Apagar</button>
        </div>
    </div>
</div><!-- col-12 -->
@endforeach
@else
<div class="alert alert-warning mb-0">Nenhum resultado foi localizado...</div>
@endif

