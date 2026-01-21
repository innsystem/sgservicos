@php
    $isEdit = isset($result) && isset($result->id);
    $aboutId = $isEdit ? $result->id : null;
@endphp

<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h5 class="mb-1">{{ $isEdit ? 'Editar Sobre' : 'Configurar Sobre' }}</h5>
            <small class="text-muted">Configure a seção sobre da página inicial</small>
        </div>
    </div>
</div>

<form id="form-request-abouts">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Conteúdo Principal</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="subtitle" class="form-label">Subtítulo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Ex: About Us" value="{{ isset($result->subtitle) ? $result->subtitle : '' }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título" value="{{ isset($result->title) ? $result->title : '' }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Digite a descrição">{{ isset($result->description) ? $result->description : '' }}</textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description_2" class="form-label">Descrição 2</label>
                        <textarea class="form-control" id="description_2" name="description_2" rows="3" placeholder="Digite a segunda descrição">{{ isset($result->description_2) ? $result->description_2 : '' }}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="button_text" class="form-label">Texto do Botão</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Ex: Book Your Visit" value="{{ isset($result->button_text) ? $result->button_text : '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="button_link" class="form-label">Link do Botão</label>
                                <input type="text" class="form-control" id="button_link" name="button_link" placeholder="Ex: /#contato" value="{{ isset($result->button_link) ? $result->button_link : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Características (Features)</h6>
                </div>
                <div class="card-body">
                    <div id="features-container">
                        @php
                            $features = isset($result->features) && is_array($result->features) ? $result->features : [];
                            if (empty($features)) {
                                $features = ['', '', '', ''];
                            }
                        @endphp
                        @foreach($features as $index => $feature)
                        <div class="row mb-2 feature-item">
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="features[]" placeholder="Digite uma característica" value="{{ $feature }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-sm btn-danger remove-feature" title="Remover">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-success" id="add-feature">
                            <i class="fa fa-plus"></i> Adicionar Característica
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Imagens</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="image_1" class="form-label">Imagem 1 (Principal)</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="image_1" name="image_1">
                        @if(isset($result->image_1) && $result->image_1)
                        <div class="mt-3">
                            <label class="form-label">Imagem Atual:</label>
                            <div class="border rounded p-2 text-center">
                                <img src="{{ asset('storage/' . $result->image_1) }}" alt="Imagem atual" class="img-fluid rounded" style="max-height: 150px;">
                                <small class="d-block text-muted mt-2">{{ basename($result->image_1) }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image_2" class="form-label">Imagem 2 (Secundária)</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="image_2" name="image_2">
                        @if(isset($result->image_2) && $result->image_2)
                        <div class="mt-3">
                            <label class="form-label">Imagem Atual:</label>
                            <div class="border rounded p-2 text-center">
                                <img src="{{ asset('storage/' . $result->image_2) }}" alt="Imagem atual" class="img-fluid rounded" style="max-height: 150px;">
                                <small class="d-block text-muted mt-2">{{ basename($result->image_2) }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Configurações</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select" required>
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}" @if (isset($result->status) && $result->status == $status->id) selected @endif>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="sort_order" value="0">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-light" onclick="loadContentPage()">
                    <i class="fa fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-success button-abouts-save" @if($isEdit) data-type="edit" data-about-id="{{ $aboutId }}" @else data-type="store" @endif>
                    <i class="fa fa-check"></i> Salvar
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#add-feature').on('click', function() {
            var html = '<div class="row mb-2 feature-item">' +
                '<div class="col-md-11"><input type="text" class="form-control" name="features[]" placeholder="Digite uma característica"></div>' +
                '<div class="col-md-1"><button type="button" class="btn btn-sm btn-danger remove-feature" title="Remover"><i class="fa fa-times"></i></button></div>' +
                '</div>';
            $('#features-container').append(html);
        });

        $(document).on('click', '.remove-feature', function() {
            $(this).closest('.feature-item').remove();
        });
    });
</script>
