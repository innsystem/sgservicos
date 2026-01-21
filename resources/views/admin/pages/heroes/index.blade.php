@extends('admin.base')

@section('title', 'Hero / Início')

@section('content')
<div class="container">
    <div class="py-2 gap-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">@yield('title')</h4>
            <small class="text-muted">Configure o conteúdo principal da página inicial</small>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="content-load-page">
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<script>
    $(document).ready(function() {
        loadContentPage();
    });

    function loadContentPage() {
        var url = `{{ url('/admin/heroes/load') }}`;

        $.get(url, function(data) {
            $("#content-load-page").html(data);
        });
    }
</script>

<script>
    // Create
    $(document).on("click", ".button-heroes-create", function(e) {
        e.preventDefault();
        loadFormPage('create');
    });

    // Edit
    $(document).on("click", ".button-heroes-edit", function(e) {
        e.preventDefault();
        let hero_id = $(this).data('hero-id');
        loadFormPage('edit', hero_id);
    });

    function loadFormPage(type, hero_id = null) {
        var url, title;
        if (type === 'create') {
            url = `{{ url('/admin/heroes/create') }}`;
            title = 'Configurar Hero';
        } else {
            url = `{{ url('/admin/heroes/${hero_id}/edit') }}`;
            title = 'Editar Hero';
        }

        $.get(url, function(data) {
            $("#content-load-page").html(data);
            if (type === 'create') {
                $(".button-heroes-save").attr('data-type', 'store');
            } else {
                $(".button-heroes-save").attr('data-type', 'edit').attr('data-hero-id', hero_id);
            }
        });
    }

    // Save
    $(document).on('click', '.button-heroes-save', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        let button = $(this);
        let hero_id = button.data('hero-id');
        var type = button.data('type');

        if (type == 'store') {
            var url = `{{ url('/admin/heroes/store/') }}`;
        } else {
            if (hero_id) {
                var url = `{{ url('/admin/heroes/${hero_id}/update') }}`;
            }
        }

        var form = $('#form-request-heroes')[0];
        var formData = new FormData(form);

        $.ajax({
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            method: 'POST',
            beforeSend: function() {
                button.attr("disabled", true);
                button.append('<i class="fa fa-spinner fa-spin ml-3"></i>');
            },
            complete: function() {
                button.prop("disabled", false);
                button.find('.fa-spinner').addClass('d-none');
            },
            success: function(data) {
                Swal.fire({
                    text: data,
                    icon: 'success',
                    showClass: {
                        popup: 'animate_animated animate_backInUp'
                    }
                }).then(() => {
                    loadContentPage();
                });
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    Swal.fire({
                        text: 'Validação: ' + xhr.responseJSON,
                        icon: 'warning',
                        showClass: {
                            popup: 'animate_animated animate_wobble'
                        }
                    });
                } else {
                    Swal.fire({
                        text: 'Erro Interno: ' + xhr.responseJSON,
                        icon: 'error',
                        showClass: {
                            popup: 'animate_animated animate_wobble'
                        }
                    });
                }
            }
        });
    });

</script>
@endsection

