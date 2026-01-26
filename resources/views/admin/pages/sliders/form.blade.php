<form id="form-request-sliders">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="image" class="col-sm-12">Imagem{{ isset($result) ? ' (opcional - deixe em branco para manter a atual)' : '' }}:</label>
            <div class="col-sm-12">
                <input type="file" accept=".jpg, .jpeg, .png, .hiff" class="form-control" id="image" name="image">
                @if(isset($result) && $result->image)
                <small class="form-text text-muted mt-2 d-block">
                    Imagem atual: 
                    <a href="{{ asset('storage/' . $result->image) }}" target="_blank" class="text-primary">
                        <i class="fa fa-image"></i> Ver imagem atual
                    </a>
                </small>
                @endif
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="title" class="col-sm-12">Título:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="title" name="title" placeholder="Digite o title" value="{{ isset($result->title) ? $result->title : '' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="href" class="col-sm-12">Link Externo (opcional):</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="href" name="href" placeholder="Digite o href" value="{{ isset($result->href) ? $result->href : '' }}">
            </div>
        </div>
        <div class="form-group mb-3 d-none">
            <label for="target" class="col-sm-12">Target:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="target" name="target" placeholder="Digite o target" value="{{ isset($result->target) ? $result->target : 'page-home' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="image_position" class="col-sm-12">Posição da Imagem:</label>
            <div class="col-sm-12">
                <select name="image_position" id="image_position" class="form-select">
                    <option value="left" @if (isset($result->image_position) && $result->image_position == 'left') selected @endif>Esquerda</option>
                    <option value="center" @if (!isset($result->image_position) || $result->image_position == 'center') selected @endif>Centro</option>
                    <option value="right" @if (isset($result->image_position) && $result->image_position == 'right') selected @endif>Direita</option>
                </select>
                <small class="form-text text-muted">Escolha onde a pessoa está posicionada na imagem para melhor exibição no mobile</small>
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
        <button type="button" class="btn btn-success button-sliders-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>