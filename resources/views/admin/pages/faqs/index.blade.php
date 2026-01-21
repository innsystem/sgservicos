@extends('admin.base')

@section('title', 'FAQ')

@section('content')
<div class="container">
    <div class="py-2 gap-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">@yield('title')</h4>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-success button-faqs-create"><i class="fa fa-plus"></i> Adicionar</button>
            <button type="button" class="btn btn-sm btn-primary ms-2 button-faqs-toggle-filters"><i class="fas fa-filter"></i> Filtros</button>
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
                                <button type="button" id="button-faqs-filters" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Filtrar</button>
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="modalFaqs" aria-labelledby="modalFaqsLabel">
    <div class="offcanvas-header">
        <h5 id="modalFaqsLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> <!-- end offcanvas-header-->

    <div class="offcanvas-body" id="modal-content-faqs">
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
        var url = `{{ url('/admin/faqs/load') }}`;
        var filters = $('#filter-form').serialize();

        $.get(url + '?' + filters, function(data) {
            $("#content-load-page").html(data);
        });
    }

    $(document).on("click", ".button-faqs-toggle-filters", function(e) {
        e.preventDefault();
        $('#content_filters').toggleClass('d-none');
    });

    $(document).on("click", "#button-faqs-filters", function(e) {
        e.preventDefault();
        loadContentPage();
    });
</script>

<script>
    // Create
    $(document).on("click", ".button-faqs-create", function(e) {
        e.preventDefault();
        $("#modal-content-faqs").html('');
        $("#modalFaqsLabel").text('Nova FAQ');
        var offcanvas = new bootstrap.Offcanvas($('#modalFaqs'));
        offcanvas.show();

        var url = `{{ url('/admin/faqs/create') }}`;
        $.get(url, function(data) {
            $("#modal-content-faqs").html(data);
            $(".button-faqs-save").attr('data-type', 'store');
        });
    });

    // Edit
    $(document).on("click", ".button-faqs-edit", function(e) {
        e.preventDefault();
        let faq_id = $(this).data('faq-id');
        $("#modal-content-faqs").html('');
        $("#modalFaqsLabel").text('Editar FAQ');
        var offcanvas = new bootstrap.Offcanvas($('#modalFaqs'));
        offcanvas.show();

        var url = `{{ url('/admin/faqs/${faq_id}/edit') }}`;
        $.get(url, function(data) {
            $("#modal-content-faqs").html(data);
            $(".button-faqs-save").attr('data-type', 'edit').attr('data-faq-id', faq_id);
        });
    });

    // Save
    $(document).on('click', '.button-faqs-save', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        let button = $(this);
        let faq_id = button.data('faq-id');
        var type = button.data('type');

        if (type == 'store') {
            var url = `{{ url('/admin/faqs/store/') }}`;
        } else {
            if (faq_id) {
                var url = `{{ url('/admin/faqs/${faq_id}/update') }}`;
            }
        }

        var form = $('#form-request-faqs')[0];
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
                        $("#modal-content-faqs").html('');
                        var offcanvas = bootstrap.Offcanvas.getInstance($('#modalFaqs'));
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
    $(document).on('click', '.button-faqs-delete', function(e) {
        e.preventDefault();
        let faq_id = $(this).data('faq-id');
        let faq_name = $(this).data('faq-name');

        Swal.fire({
            title: 'Deseja apagar ' + faq_name + '?',
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
                    url: `{{ url('/admin/faqs/${faq_id}/delete') }}`,
                    method: 'POST',
                    success: function(data) {
                        $('#row_faq_' + faq_id).remove();
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
    
    // Gerenciar campo de categoria customizada
    $(document).on('change', '#category', function() {
        if ($(this).val() === '__custom__') {
            $('#category_custom').show().prop('required', true);
            $('#category').prop('required', false);
        } else {
            $('#category_custom').hide().prop('required', false);
            $('#category').prop('required', true);
        }
    });
    
    // Inicializar ao carregar o formulário
    $(document).on('shown.bs.offcanvas', '#modalFaqs', function() {
        if ($('#category').val() === '__custom__' || $('#category_custom').val()) {
            $('#category_custom').show().prop('required', true);
            $('#category').prop('required', false);
        }
    });
</script>
@endsection

