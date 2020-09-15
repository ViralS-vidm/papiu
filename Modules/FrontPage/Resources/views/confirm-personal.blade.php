@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_BOOK] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_BOOK]['title'] }} @endsection

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
                    <a href="/booking-list">
                        <img src="{{ theme_url('images/icon_back.png') }}" alt=""/>
                        {{ __('frontpage::message.back_title') }}
                    </a>
                    <h1>{{ __('frontpage::message.checkout_title') }}</h1>
                </div>
                <ul class="timeBooking">
                    <li>
                        <span>
                            Thời gian Booking: <strong><span id="time-start-label">{{ $time_start }}</span> - <span
                                    id="time-end-label">{{ $time_end }}</span> </strong>
                        </span>
                    </li>
                </ul><!-- End .timeBooking -->
                <form action="{{ route('frontpage.booking-done') }}" class="form_personal form-confirm-info"
                      id="form-confirm-focus" method="post">
                    @csrf
                    <input type="hidden" name="services" value="{{ $services }}">
                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                    <input type="hidden" name="product_name" value="{{ $product_name }}">
                    <input type="hidden" name="time_start" value="{{ $time_start }}">
                    <input type="hidden" name="time_end" value="{{ $time_end }}">
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
                    <div class="confirm_personal">
                        <div class="title_form">
                            <span>{{ __('frontpage::message.confirm_form') }}</span>
                            <h1>{{ __('frontpage::message.infomation_room') }}</h1>
                        </div>
                        <div class="form_write">
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.start_date') }}</label>
                                <p type="text" class="form-control">{{ $time_start }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.end_date') }}</label>
                                <p type="text" class="form-control">{{ $time_end }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.option_home') }}</label>
                                <p type="text" class="form-control">{{ $product_name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('frontpage::message.option_services') }}</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Nhà hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <div class="pricesed">
                                <span>{{ __('frontpage::message.total_title') }}</span>
                                <p>
                                    <span id="total-price">{{ $total_price }}</span>
                                    {{ get_currency() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <ul class="buttonAction">
                        <li>
                            <button type="submit"
                                    class="btn-primary-confrim btn-submit-confirm">{{ __('frontpage::message.confirm_infomation') }}</button>
                        </li>
                        <li>
                            <a href="{{ route('frontpage.booking-list', ['time_start' => $time_start, 'time_end' => $time_end]) }}">
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
    <script src="{{ theme_url('js/functions/validate-phone.js') }}" defer></script>
    @include('common-components.functions.toastr')
    <script>
        $(function () {
            $(document).on('click', '.btn-submit-confirm', function (e) {
                e.preventDefault()
                let validated = true
                $('.form-confirm-info input.form-control').removeClass('required').each(function (index) {
                    if ($(this).val().trim() == '') {
                        $(this).addClass('required')
                        validated = false
                    }
                })
                if (!validated) {
                    toastr.warning('{{ __('frontpage::labels.you_must_fill_all') }}')
                    let element = document.getElementById('form-confirm-focus')
                    element.scrollIntoView()
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
