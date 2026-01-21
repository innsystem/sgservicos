@extends('admin.base')

@section('title', 'Especialidades')

@section('content')
<div class="container">
    <div class="py-2 gap-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">@yield('title')</h4>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-success button-specialties-create"><i class="fa fa-plus"></i> Adicionar</button>
            <button type="button" class="btn btn-sm btn-primary ms-2 button-specialties-toggle-filters"><i class="fas fa-filter"></i> Filtros</button>
        </div>
    </div>
    <div id="content_filters" class="row d-none">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="filter-form">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nome:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome">
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status:</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="date_range">Período:</label>
                                <input type="text" id="date_range" name="date_range" class="form-control rangecalendar-period" placeholder="Selecione o intervalo">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="button" id="button-specialties-filters" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="content-load-page" class="row">
                    </div><!-- row -->
                </div> <!-- end card body -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageMODAL')
<div class="offcanvas offcanvas-end" tabindex="-1" id="modalSpecialties" aria-labelledby="modalSpecialtiesLabel">
    <div class="offcanvas-header">
        <h5 id="modalSpecialtiesLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> <!-- end offcanvas-header-->

    <div class="offcanvas-body" id="modal-content-specialties">
    </div> <!-- end offcanvas-body-->
</div> <!-- end offcanvas-->
@endsection

@section('pageCSS')
<!-- Flatpickr Timepicker css -->
<link href="{{ asset('/tpl_dashboard/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('pageJS')
<!-- Flatpickr Timepicker Plugin js -->
<script src="{{ asset('/tpl_dashboard/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('/tpl_dashboard/vendor/flatpickr/l10n/pt.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#date_range").flatpickr({
            "mode": "range",
            "dateFormat": "d/m/Y",
            "locale": "pt",
            "firstDayOfWeek": 1,
        });

        loadContentPage();
    });

    function loadContentPage() {
        $("#content-load-page").html('');
        var url = `{{ url('/admin/specialties/load') }}`;
        var filters = $('#filter-form').serialize();

        $.get(url + '?' + filters, function(data) {
            $("#content-load-page").html(data);
        });
    }

    $(document).on("click", ".button-specialties-toggle-filters", function(e) {
        e.preventDefault();
        $('#content_filters').toggleClass('d-none');
    });

    $(document).on("click", "#button-specialties-filters", function(e) {
        e.preventDefault();
        loadContentPage();
    });
</script>

<script>
    // Create
    $(document).on("click", ".button-specialties-create", function(e) {
        e.preventDefault();
        $("#modal-content-specialties").html('');
        $("#modalSpecialtiesLabel").text('Nova Especialidade');
        var offcanvas = new bootstrap.Offcanvas($('#modalSpecialties'));
        offcanvas.show();

        var url = `{{ url('/admin/specialties/create') }}`;
        $.get(url, function(data) {
            $("#modal-content-specialties").html(data);
            $(".button-specialties-save").attr('data-type', 'store');
        });
    });

    // Edit
    $(document).on("click", ".button-specialties-edit", function(e) {
        e.preventDefault();
        let specialty_id = $(this).data('specialty-id');
        $("#modal-content-specialties").html('');
        $("#modalSpecialtiesLabel").text('Editar Especialidade');
        var offcanvas = new bootstrap.Offcanvas($('#modalSpecialties'));
        offcanvas.show();

        var url = `{{ url('/admin/specialties/${specialty_id}/edit') }}`;
        $.get(url, function(data) {
            $("#modal-content-specialties").html(data);
            $(".button-specialties-save").attr('data-type', 'edit').attr('data-specialty-id', specialty_id);
        });
    });

    // Save
    $(document).on('click', '.button-specialties-save', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        let button = $(this);
        let specialty_id = button.data('specialty-id');
        var type = button.data('type');

        if (type == 'store') {
            var url = `{{ url('/admin/specialties/store/') }}`;
        } else {
            if (specialty_id) {
                var url = `{{ url('/admin/specialties/${specialty_id}/update') }}`;
            }
        }

        var form = $('#form-request-specialties')[0];
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
                    },
                    onClose: () => {
                        $("#modal-content-specialties").html('');
                        var offcanvas = bootstrap.Offcanvas.getInstance($('#modalSpecialties'));
                        if (offcanvas) {
                            offcanvas.hide();
                        }
                        loadContentPage();
                    }
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

    // Delete
    $(document).on('click', '.button-specialties-delete', function(e) {
        e.preventDefault();
        let specialty_id = $(this).data('specialty-id');
        let specialty_name = $(this).data('specialty-name');

        Swal.fire({
            title: 'Deseja apagar ' + specialty_name + '?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#333',
            confirmButtonText: 'Sim, apagar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: `{{ url('/admin/specialties/${specialty_id}/delete') }}`,
                    method: 'POST',
                    success: function(data) {
                        $('#row_specialty_' + specialty_id).remove();
                        Swal.fire({
                            text: data,
                            icon: 'success',
                            showClass: {
                                popup: 'animate__animated animate__headShake'
                            }
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            text: xhr.responseJSON,
                            icon: 'error',
                            showClass: {
                                popup: 'animate__animated animate__headShake'
                            }
                        });
                    }
                });
            }
        })
    });
</script>
@endsection

