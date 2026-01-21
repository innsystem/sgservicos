<form id="form-request-faqs">
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="category" class="col-sm-12">Categoria <span class="text-danger">*</span>:</label>
            <div class="col-sm-12">
                <select class="form-select" id="category" name="category">
                    <option value="">Selecione uma categoria</option>
                    <option value="Consultas e exames" {{ (isset($result->category) && $result->category == 'Consultas e exames') ? 'selected' : '' }}>Consultas e exames</option>
                    <option value="Tratamentos e procedimentos" {{ (isset($result->category) && $result->category == 'Tratamentos e procedimentos') ? 'selected' : '' }}>Tratamentos e procedimentos</option>
                    <option value="__custom__" {{ (isset($result->category) && !in_array($result->category, ['Consultas e exames', 'Tratamentos e procedimentos'])) ? 'selected' : '' }}>Outra (digite abaixo)</option>
                </select>
                <input type="text" class="form-control mt-2" id="category_custom" name="category_custom" placeholder="Digite uma nova categoria" value="{{ (isset($result->category) && !in_array($result->category, ['Consultas e exames', 'Tratamentos e procedimentos'])) ? $result->category : '' }}" style="display: {{ (isset($result->category) && !in_array($result->category, ['Consultas e exames', 'Tratamentos e procedimentos'])) ? 'block' : 'none' }};">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="question" class="col-sm-12">Pergunta:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="question" name="question" placeholder="Digite a pergunta" value="{{ isset($result->question) ? $result->question : '' }}" required>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="answer" class="col-sm-12">Resposta:</label>
            <div class="col-sm-12">
                <textarea class="form-control" id="answer" name="answer" rows="4" placeholder="Digite a resposta" required>{{ isset($result->answer) ? $result->answer : '' }}</textarea>
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
        <button type="button" class="btn btn-success button-faqs-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>

