@php
    $isEdit = isset($result) && isset($result->id);
    $heroId = $isEdit ? $result->id : null;
@endphp

<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h5 class="mb-1">{{ $isEdit ? 'Editar Hero' : 'Configurar Hero' }}</h5>
            <small class="text-muted">Configure o conteúdo principal da página inicial</small>
        </div>
    </div>
</div>

<form id="form-request-heroes">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Conteúdo Principal</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Título Principal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título principal" value="{{ isset($result->title) ? $result->title : '' }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Digite a descrição">{{ isset($result->description) ? $result->description : '' }}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="button_text" class="form-label">Texto do Botão</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Ex: Agendar agora" value="{{ isset($result->button_text) ? $result->button_text : '' }}">
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
                    <h6 class="mb-0">Estatísticas</h6>
                </div>
                <div class="card-body">
                    <div id="statistics-container">
                        @php
                            $statistics = isset($result->statistics) && is_array($result->statistics) ? $result->statistics : [];
                            if (empty($statistics)) {
                                $statistics = [
                                    ['title' => '', 'value' => '', 'description' => ''],
                                    ['title' => '', 'value' => '', 'description' => ''],
                                    ['title' => '', 'value' => '', 'description' => ''],
                                    ['title' => '', 'value' => '', 'description' => ''],
                                ];
                            }
                        @endphp
                        @foreach($statistics as $index => $stat)
                        <div class="row mb-2 statistic-item">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="statistics_title[]" placeholder="Título da estatística" value="{{ $stat['title'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="statistics_value[]" placeholder="Valor" value="{{ $stat['value'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="statistics_description[]" placeholder="Descrição (opcional)" value="{{ $stat['description'] ?? '' }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-sm btn-danger remove-statistic" title="Remover">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-success" id="add-statistic">
                            <i class="fa fa-plus"></i> Adicionar Estatística
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Imagem de Fundo</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="background_image" name="background_image">
                        @if(isset($result->background_image) && $result->background_image)
                        <div class="mt-3">
                            <label class="form-label">Imagem Atual:</label>
                            <div class="border rounded p-2 text-center">
                                <img src="{{ asset('storage/' . $result->background_image) }}" alt="Imagem atual" class="img-fluid rounded" style="max-height: 200px;">
                                <small class="d-block text-muted mt-2">{{ basename($result->background_image) }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Pacientes Satisfeitos</h6>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="satisfied_patients_count" class="form-label">Contador (número)</label>
                        <input type="text" class="form-control" id="satisfied_patients_count" name="satisfied_patients_count" placeholder="Ex: 24k" value="{{ isset($result->satisfied_patients_count) ? $result->satisfied_patients_count : '' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="satisfied_patients_label" class="form-label">Label</label>
                        <input type="text" class="form-control" id="satisfied_patients_label" name="satisfied_patients_label" placeholder="Ex: Pacientes satisfeitos" value="{{ isset($result->satisfied_patients_label) ? $result->satisfied_patients_label : '' }}">
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
                <button type="button" class="btn btn-success button-heroes-save" @if($isEdit) data-type="edit" data-hero-id="{{ $heroId }}" @else data-type="store" @endif>
                    <i class="fa fa-check"></i> Salvar
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#add-statistic').on('click', function() {
            var html = '<div class="row mb-2 statistic-item">' +
                '<div class="col-md-5"><input type="text" class="form-control" name="statistics_title[]" placeholder="Título da estatística"></div>' +
                '<div class="col-md-3"><input type="text" class="form-control" name="statistics_value[]" placeholder="Valor"></div>' +
                '<div class="col-md-3"><input type="text" class="form-control" name="statistics_description[]" placeholder="Descrição (opcional)"></div>' +
                '<div class="col-md-1"><button type="button" class="btn btn-sm btn-danger remove-statistic" title="Remover"><i class="fa fa-times"></i></button></div>' +
                '</div>';
            $('#statistics-container').append(html);
        });

        $(document).on('click', '.remove-statistic', function() {
            $(this).closest('.statistic-item').remove();
        });
    });
</script>
