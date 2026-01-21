<form id="form-request-permissions">
    <div class="modal-body">
        <div class="row mb-2">
            <div class="col-12">
                <select name="routes[]" id="multi-route-select fs-4" class="form-select" multiple style="height: 440px;">
                    @foreach($routes as $route)
                    <option class="py-1" value="{{$route['name']}}">{{$route['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="bg-gray modal-footer justify-content-between">
        <button type="button" class="btn btn-success button-permissions-save"><i class="fa fa-check"></i> Salvar</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Fechar">Fechar</button>
    </div>
</form>