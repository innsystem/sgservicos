@extends('site.base')

@section('title', 'Entre em Contato - Contábil & BPO Financeiro / DP / RH')

@section('content')
<!-- Contact Section Start -->
<section class="contact-one contact-two contact-three" style="padding-top:160px;">
    <div class="contact-one__wrap">
        <div class="container">
            <div class="contact-one__inner">
                <ul class="contact-one__contact-list list-unstyled">
                    @if(isset($getSettings['address']) && trim($getSettings['address']) !== '')
                    <li>
                        <div class="icon">
                            <span class="icon-location-filled-1"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text">{!! nl2br(e($getSettings['address'])) !!}</p>
                        </div>
                    </li>
                    @endif
                    @if(isset($getSettings['telephone']) && $getSettings['telephone'] != '')
                    <li>
                        <div class="icon">
                            <span class="icon-phone-auricular"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text-2">Fale Conosco</p>
                            <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}">{{ $getSettings['telephone'] }}</a>
                        </div>
                    </li>
                    @endif
                    @if(isset($getSettings['email']) && $getSettings['email'] != '')
                    <li>
                        <div class="icon">
                            <span class="icon-email-3"></span>
                        </div>
                        <div class="contact">
                            <p class="contact-one__text-2">Envie um Email</p>
                            <a href="mailto:{{ $getSettings['email'] }}">{{ $getSettings['email'] }}</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Contact One End-->

<!-- Contact Info Section Start -->
<section class="contact-section-4 fix section-padding">
    <div class="container">
        <div class="contact-wrapper-3" style="background:none;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span class="section-title__tagline">Nossa Localização</span>
                        <h2 class="section-title__title">Encontre-nos</h2>
                        <p style="font-size: 16px; margin-top: 15px; color: var(--corle-base, #2563eb);"><strong>Contábil & BPO Financeiro / DP / RH</strong></p>
                    </div>
                    <div class="iframe-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.9701976544566!2d-46.8509150246652!3d-23.71275827869607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cfad141fe3054d%3A0xdd9379a2208e9c64!2sRua%20Am%C3%A9rico%20Vazone%2C%2045%20-%20Jardim%20Tereza%20Maria%2C%20Itapecerica%20da%20Serra%20-%20SP%2C%2006850-600!5e0!3m2!1spt-BR!2sbr!4v1741903937010!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info-content">
                        <div class="contact-info-area mt-4">
                            <div class="row g-4">
                                @if(isset($getSettings['telephone']) && trim($getSettings['telephone']) != '')
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="contact-info-items">
                                        <div class="icon">
                                            <span class="icon-phone"></span>
                                        </div>
                                        <div class="content">
                                            <h3 class="section-title__title">Telefones</h3>
                                            <p>
                                                Recepção
                                                <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone']) }}" class="me-3">{{ $getSettings['telephone'] }}</a>
                                            </p>
                                            @if(isset($getSettings['telephone_fixo']) && trim($getSettings['telephone_fixo']) != '')
                                            <p>
                                                Recepção Fixo
                                                <a href="tel:{{ preg_replace('/\D/', '', $getSettings['telephone_fixo']) }}" class="me-3">{{ $getSettings['telephone_fixo'] }}</a>
                                            </p>
                                            @endif
                                            @if(isset($getSettings['cellphone']) && trim($getSettings['cellphone']) != '')
                                            <p>
                                                Financeiro
                                                <a href="tel:{{ preg_replace('/\D/', '', $getSettings['cellphone']) }}">{{ $getSettings['cellphone'] }}</a>
                                            </p>
                                            @endif
                                            @if(isset($getSettings['cellphone_other']) && trim($getSettings['cellphone_other']) != '')
                                            <p>
                                                Relacionamento
                                                <a href="tel:{{ preg_replace('/\D/', '', $getSettings['cellphone_other']) }}">{{ $getSettings['cellphone_other'] }}</a>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(isset($getSettings['address']) && $getSettings['address'] != '')
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="contact-info-items">
                                        <div class="icon">
                                            <span class="icon-location-filled-1"></span>
                                        </div>
                                        <div class="content">
                                            <h3 class="section-title__title">Localização</h3>
                                            <p>{!! nl2br(e($getSettings['address'])) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(isset($getSettings['hour_open']) && $getSettings['hour_open'] != '')
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="contact-info-items">
                                        <div class="icon">
                                            <span class="icon-clock"></span>
                                        </div>
                                        <div class="content">
                                            <h3 class="section-title__title">Atendimento</h3>
                                            <p>{!! nl2br(e($getSettings['hour_open'])) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Info Section End -->
@endsection

@section('pageMODAL')
@endsection

@section('pageCSS')
@endsection

@section('pageJS')
<script>
    $(document).on('click', '#button-contact-send', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        let button = $(this);
        let form = $('#request-form-contact')[0];
        let formData = new FormData(form);

        $.ajax({
            url: `{{ url('/contato/send-email') }}`,
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
                button.find('.fa-spinner').remove();
            },
            success: function(data) {
                Swal.fire({
                    text: data.message || 'Mensagem enviada com sucesso!',
                    icon: 'success',
                    showClass: {
                        popup: 'animate_animated animate_backInUp'
                    }
                });
                form.reset();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    Swal.fire({
                        text: 'Validação: ' + JSON.stringify(xhr.responseJSON),
                        icon: 'warning',
                        showClass: {
                            popup: 'animate_animated animate_wobble'
                        }
                    });
                } else {
                    Swal.fire({
                        text: 'Erro Interno: ' + (xhr.responseJSON?.message || 'Erro ao enviar mensagem'),
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
