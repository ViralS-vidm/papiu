@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_CONTACT] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_CONTACT]['title'] }} @endsection

@section('content')
    <div class="foodSlide">
        <div class="imgFood">
            <img src="{{ theme_url('images/contact.jpg') }}" class="d-block w-100" alt=""/>
        </div>
    </div>
    <div class="container">
        <div class="maps">
            <h1>{{ __('frontpage::message.contact_support') }}</h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25515.517519939378!2d105.1071381!3d22.8057083!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cb87a4110b3ca3%3A0xdeb65095c70d188d!2zS2h1IG5naMSpIGTGsOG7oW5nIFAnYXBpdQ!5e1!3m2!1sen!2s!4v1594720019112!5m2!1sen!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
            <ul class="list_address">
                <li>
                    <h2>P’apiu Resort</h2>
                    <div>
                        <span>Địa chỉ : </span>
                        <p> Km18 xã Yên Đỉnh, Bắc Mê, Hà Giang</p>
                    </div>
                    <div>
                        <span>Hotline : </span>
                        <p> 0219 3841999</p>
                    </div>
                    <div>
                        <span>Email:</span>
                        <p>contact@papiu.vn</p>
                    </div>
                </li>
                <li>
                    <h2>Văn phòng đại diện</h2>
                    <div>
                        <span>Địa chỉ : </span>
                        <p> Km18 xã Yên Đỉnh, Bắc Mê, Hà Giang</p>
                    </div>
                    <div>
                        <span>Hotline :</span>
                        <p> 0219 3841999</p>
                    </div>
                    <div>
                        <span>Email :</span>
                        <p>contact@papiu.vn</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="feedbacks">
            <h1>{{ __('frontpage::message.feedback_title') }}</h1>
            <form action="{{ route('frontpage.contact-create') }}" method="post" class="form-confirm-info">
                @csrf
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.name_form') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.phone_form') }}</label>
                    <div class="form-input">
                        <input type="number" class="form-control" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.email_form') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.text_feedback') }}</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit"
                        class="btn-primary-send btn-submit-confirm">{{ __('frontpage::message.send_feedback') }}</button>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style>
        .toast {
            font-size: 22px;
            width: 400px !important;
            opacity: 1 !important;
        }

        .form-confirm-info input {
            padding-left: 20px;
        }

        .required {
            border: 2px red solid !important;
        }
    </style>
@endsection

@push('script-extra')
    @include('common-components.functions.toastr')
    <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
    <script src="{{ theme_url('js/functions/validate-phone.js') }}" defer></script>

    <script>
        $(function () {
            $(document).on('click', '.btn-submit-confirm', function (e) {
                e.preventDefault()
                let validated = true

                $('.form-confirm-info .form-control').removeClass('required').removeClass('required').each(function (index) {
                    if ($(this).val().trim() == '' && ($(this).attr('name') == 'phone'
                        || $(this).attr('name') == 'email'
                        || $(this).attr('name') == 'content')) {
                        $(this).addClass('required')
                        validated = false
                    }
                })

                if (!validated) {
                    toastr.warning('{{ __('frontpage::labels.you_must_fill_all') }}')
                    return
                }

                if (!validateNumber($(`input[name='phone']`).val().trim())) {
                    $(`input[name='phone']`).val('').focus()
                    return
                }
                $('.form-confirm-info').submit()
            })

            dob_date_picker.on('change', function () {
                if (!validateDob($(`input[name='dob']`).val())) {
                    $('input[name=\'dob\']').val('')
                    return false
                }
            })
        })
    </script>
@endpush
