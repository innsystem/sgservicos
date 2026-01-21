@extends('admin.base')

@section('title', 'Sobre')

@section('content')
<div class="container">
    <div class="py-2 gap-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">@yield('title')</h4>
            <small class="text-muted">Configure a seção sobre da página inicial</small>
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
        var url = `{{ url('/admin/abouts/load') }}`;

        $.get(url, function(data) {
            $("#content-load-page").html(data);
        });
    }
</script>

<script>
    // Create
    $(document).on("click", ".button-abouts-create", function(e) {
        e.preventDefault();
        loadFormPage('create');
    });

    // Edit
    $(document).on("click", ".button-abouts-edit", function(e) {
        e.preventDefault();
        let about_id = $(this).data('about-id');
        loadFormPage('edit', about_id);
    });

    function loadFormPage(type, about_id = null) {
        var url, title;
        if (type === 'create') {
            url = `{{ url('/admin/abouts/create') }}`;
            title = 'Configurar Sobre';
        } else {
            url = `{{ url('/admin/abouts/${about_id}/edit') }}`;
            title = 'Editar Sobre';
        }

        $.get(url, function(data) {
            $("#content-load-page").html(data);
            if (type === 'create') {
                $(".button-abouts-save").attr('data-type', 'store');
            } else {
                $(".button-abouts-save").attr('data-type', 'edit').attr('data-about-id', about_id);
            }
        });
    }

    // Save
    $(document).on('click', '.button-abouts-save', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        let button = $(this);
        let about_id = button.data('about-id');
        var type = button.data('type');

        if (type == 'store') {
            var url = `{{ url('/admin/abouts/store/') }}`;
        } else {
            if (about_id) {
                var url = `{{ url('/admin/abouts/${about_id}/update') }}`;
            }
        }

        var form = $('#form-request-abouts')[0];
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

