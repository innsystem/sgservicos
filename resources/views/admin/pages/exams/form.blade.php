<form id="form-request-exams">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="icon" class="col-sm-12">Ícone (Font Awesome):</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Ex: fas fa-eye" value="{{ isset($result->icon) ? $result->icon : '' }}">
                <small class="text-muted">Use classes do Font Awesome (ex: fas fa-eye, fas fa-tachometer-alt)</small>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="title" class="col-sm-12">Título:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título" value="{{ isset($result->title) ? $result->title : '' }}" required>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="col-sm-12">Descrição:</label>
            <div class="col-sm-12">
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Digite a descrição">{{ isset($result->description) ? $result->description : '' }}</textarea>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="status" class="col-sm-12">Status:</label>
            <div class="col-sm-12">
                <select name="status" id="status" class="form-select">
                    @foreach($statuses as $status)
                    <option value="{{$status->id}}" @if (isset($result->status) && $result->status == $status->id) selected @endif>{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="sort_order" class="col-sm-12">Posição de Exibição:</label>
            <div class="col-sm-12">
                <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Digite a posição" value="{{ isset($result->sort_order) ? $result->sort_order : '0' }}" required>
            </div>
        </div>
    </div>
    <div class="bg-gray modal-footer justify-content-between">
        <button type="button" class="btn btn-success button-exams-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>

