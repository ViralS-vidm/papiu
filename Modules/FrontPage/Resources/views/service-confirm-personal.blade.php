@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_SERVICE] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_SERVICE]['title'] }} @endsection

@section('content')
    <header>
        <a href="/">
            <img src="{{ theme_url('images/logo_book.png') }}" alt=""/>
        </a>
    </header>
    <div class="menu">
        <div class="container">
            <a href="/">{{ __('frontpage::message.home_title') }}</a>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="content_booking">
                <div class="title">
                    <a href="{{ route('frontpage.service') }}">
                        <img src="{{ theme_url('images/icon_back.png') }}" alt=""/>
                        {{ __('frontpage::message.back_title') }}
                    </a>
                </div>
                <form action="{{ route('frontpage.service-confirm') }}" class="form_personal form-confirm-info"
                      method="post">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service_id }}">
                    <input type="hidden" name="service_name" value="{{ $service_name }}">
                    <div class="infomation_required">
                        <div class="title_form">
                            <span>{{ __('frontpage::message.infomation_required') }}</span>
                            <h1>{{ __('frontpage::message.infomation_personal') }}</h1>
                        </div>
                        <div class="form_write">
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.name_form') }}</label>
                                <div class="inputForm">
                                    <input type="text" class="form-control" name="contact_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.phone_form') }}</label>
                                <div class="inputForm">
                                    <input type="number" class="form-control" name="contact_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.email_form') }}</label>
                                <div class="inputForm">
                                    <input type="text" class="form-control" name="contact_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.address_form') }}</label>
                                <div class="inputForm">
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="buttonAction">
                        <li>
                            <button type="submit"
                                    class="btn-primary-confrim btn-submit-confirm">{{ __('frontpage::message.confirm_infomation') }}</button>
                        </li>
                        <li>
                            <a href="{{ route('frontpage.service') }}">
                                <button type="button"
                                        class="btn-primary-confrim">{{ __('frontpage::message.change_infomation') }}</button>
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/booking_list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">

    <style>
        .required {
            border: 2px red solid !important;
        }

        .toast {
            font-size: 22px;
            width: 400px !important;
            opacity: 1 !important;
        }
    </style>
@endsection

@push('script-extra')
    @include('common-components.functions.toastr')
    <script src="{{ theme_url('js/functions/validate-phone.js') }}" defer></script>
    <script>
        $(function () {
            $(document).on('click', '.btn-submit-confirm', function (e) {
                e.preventDefault()
                let validated = true
                $('.form-confirm-info input').removeClass('required').each(function (index) {
                    if ($(this).val().trim() == '') {
                        $(this).addClass('required')
                        validated = false
                    }
                })
                if (!validated) {
                    toastr.warning('{{ __('frontpage::labels.you_must_fill_all') }}')
                    return
                }

                if (!validateNumber($(`input[name='contact_number']`).val().trim())) {
                    $(`input[name='contact_number']`).val('').focus()
                    return
                }

                $('.form-confirm-info').submit()
            })
        })
    </script>
@endpush
