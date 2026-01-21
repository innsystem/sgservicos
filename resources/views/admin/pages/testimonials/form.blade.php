<form id="form-request-testimonials">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="name" class="col-sm-12">Nome do Cliente:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome do Cliente" value="{{ isset($result->name) ? $result->name : '' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="avatar" class="col-sm-12">Imagem ou Logo:</label>
            <div class="col-sm-12">
                <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="avatar" name="avatar">
                @if(isset($result->avatar) && $result->avatar)
                <div class="mt-2">
                    <small class="text-muted">Imagem atual:</small>
                    <div class="mt-1">
                        <img src="{{ asset('storage/' . $result->avatar) }}" alt="Avatar atual" class="img-thumbnail" style="max-height: 80px;">
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="content" class="col-sm-12">Depoimento:</label>
            <div class="col-sm-12">
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Digite o Depoimento">{{ isset($result->content) ? $result->content : '' }}</textarea>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="rating" class="col-sm-12">Avaliação do Cliente <span class="text-danger">*</span>:</label>
            <div class="col-sm-12">
                <div class="rating-stars" data-rating="{{ isset($result->rating) ? $result->rating : 0 }}">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star-{{ $i }}" name="rating" value="{{ $i }}" {{ (isset($result->rating) && $result->rating == $i) ? 'checked' : '' }} required>
                        <label for="star-{{ $i }}" class="star-label" data-rating="{{ $i }}">
                            <i class="fas fa-star"></i>
                        </label>
                        @endfor
                </div>
                <small class="text-muted d-block mt-2">Clique nas estrelas para selecionar a avaliação (1 a 5 estrelas)</small>
                <input type="hidden" id="rating-value" value="{{ isset($result->rating) ? $result->rating : 0 }}">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="localization" class="col-sm-12">Localização (Cidade/Estado):</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="localization" name="localization" placeholder="Digite o Localização (Cidade/Estado)" value="{{ isset($result->localization) ? $result->localization : '' }}">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="sort_order" class="col-sm-12">Posição de Exibição:</label>
            <div class="col-sm-12">
                <input type="number" class="form-control" id="sort_order" name="sort_order" placeholder="Digite o sort_order" value="{{ isset($result->sort_order) ? $result->sort_order : '0' }}">
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
        <button type="button" class="btn btn-success button-testimonials-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>