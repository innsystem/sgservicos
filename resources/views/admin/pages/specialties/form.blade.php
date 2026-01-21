<form id="form-request-specialties">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="image" class="col-sm-12">Imagem:</label>
            <div class="col-sm-12">
                <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="image" name="image">
                @if(isset($result->image) && $result->image)
                <div class="mt-2">
                    <small class="text-muted d-block mb-2">Imagem atual:</small>
                    <div class="border rounded p-2 text-center" style="max-width: 200px;">
                        <img src="{{ asset('storage/' . $result->image) }}" alt="Imagem atual" class="img-fluid rounded" style="max-height: 150px;">
                        <small class="d-block text-muted mt-2">{{ basename($result->image) }}</small>
                    </div>
                </div>
                @endif
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
            <label for="link" class="col-sm-12">Link:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="link" name="link" placeholder="Ex: /#contato" value="{{ isset($result->link) ? $result->link : '' }}">
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
        <button type="button" class="btn btn-success button-specialties-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>

