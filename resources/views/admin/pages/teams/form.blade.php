<form id="form-request-teams">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="thumb" class="col-sm-12">Imagem da Equipe (350x440 pixels):</label>
            <div class="col-sm-12">
                <input type="file" accept=".jpg, .jpeg, .png, .hiff, .heic" class="form-control" id="thumb" name="thumb">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="name" class="col-sm-12">Nome:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" value="{{ isset($result->name) ? $result->name : '' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="role" class="col-sm-12">Cargo:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="role" name="role" placeholder="Digite o Cargo" value="{{ isset($result->role) ? $result->role : '' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="position" class="col-sm-12">Posição:</label>
            <div class="col-sm-12">
                <input type="tel" class="form-control" id="position" name="position" placeholder="Digite a Posição" value="{{ isset($result->position) ? $result->position : '' }}">
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
    </div>
    <div class="bg-gray modal-footer justify-content-between">
        <button type="button" class="btn btn-success button-teams-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>