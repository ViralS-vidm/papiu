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
                <h1>{{ __('frontpage::message.home_papiu') }}</h1>

                @include('components.search_date')

                <ul class="listBooking">
                    @if(!$products->count())
                        {{ __('frontpage::labels.no_result') }}
                    @endif
                    @foreach($products as $product)
                        <form action="{{ route('frontpage.confirm-personal') }}" method="post" class="form-booking">
                            @csrf
                            <input type="hidden" name="time_start">
                            <input type="hidden" name="time_end">
                            <input type="hidden" name="services">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                            <input type="hidden" id="input-total-price-{{ $product->id }}" name="total_price"
                                   value="{{ $product->current_price }}">
                            <li>
                                <div class="leftBooking">
                                    <img src="{{ @$product->homeImage->first()->original_url }}" alt=""/>
                                </div>

                                <div class="rightBooking">
                                    <h1>{{ $product->name }}</h1>
                                    <span class="contentBooking">{{ $product->detail_overview }}</span>
                                    <button type="button" href="{{ route('frontpage.product-detail', $product->id) }}"
                                            class="btn-primary-show show_pro_service"
                                            id="show">{{ __('frontpage::message.detail_view_title') }}
                                    </button>

                                    <ul class="list_services">
                                        <div class="left">
                                            <li>
                                                <span>{{ $product->service->name }}: {{ $product->service->description }}</span>
                                            </li>
                                        </div>
                                    </ul><!-- End .list_services -->

                                    <button type="button" class="btn-primary-show hide_pro_service" id="hide">
                                        {{ __('frontpage::message.hidden_title') }}
                                    </button>

                                    <div class="bookRoom">
                                        <div class="selectService">

                                            <button type="button" id="selectedDBXP" aria-expanded="false"
                                                    class="btn-lblDBXP"
                                                    aria-labelledby="lblDBXP DBXPList">
                                                <span id="DBXPList">Dịch vụ đi kèm</span>
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            </button>

                                            <fieldset aria-labelledby="lblDBXP">
                                                <div id="choicelist" class="fieldset-choicelist">
                                                    @foreach($services as $service)
                                                        <div>
                                                            <input name="services_{{ $product->id }}[]"
                                                                   type="checkbox"
                                                                   id="mySQL"
                                                                   class="services"
                                                                   value="{{ $service->id }}"
                                                                   product-id="{{ $product->id }}"

                                                            >
                                                            <label for="mySQL"
                                                                   aria-label="my SQL">{{ $service->name . ' (' . format_currency($service->price) . get_currency() . ')' }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="total_price">
                                            <div class="textPrice">
                                                <span>{{ __('frontpage::message.total_title') }} ({{ $diff . ' ' . __('frontpage::message.nights') }})</span>
                                                <p>
                                                <span id="total-price-{{ $product->id }}"
                                                      class="total-price-span">{{ $product->current_price }}</span>
                                                    {{ get_currency() }}
                                                </p>
                                            </div>
                                            <button type="submit" product-id="{{ $product->id }}"
                                                    class="btn-primary-booking btn-submit-booking">{{ __('frontpage::message.booking_title') }}</button>
                                        </div>
                                    </div><!-- End .bookRoom -->
                                </div>
                            </li>
                        </form>
                    @endforeach
                </ul>
            </div><!-- End .content_booking -->
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/booking_list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">

    <style>
        fieldset {
            border: none;
            padding-left: 0;
            margin-left: 0;
        }

        #lblDBXP {
            font-weight: bold;
        }

        #choicelist {
            border: 1px solid #d6d6d6;
            width: 100%;
            min-width: 200px;
            max-width: 500px;
            border-radius: 2px;
            display: none;
        }

        #selectedDBXP {
            width: 260px;
            height: 71px;
            background: #F4F4F4;
            text-decoration: none;
            padding: 0 13px;
            margin-top: 0;
        }

        #selectedDBXP:focus {
            outline: none;
        }

        #selectedDBXP span {
            width: 230px;
            height: 48px;
            background: #FFFFFF;
            border: 1px solid #D9D9D9;
            box-sizing: border-box;
            display: block;
            text-align: left;
            padding: 10px;
            position: relative;
        }

        #selectedDBXP span:after {
            display: block;
            content: '>';
            width: 10px;
            height: 10px;
            position: absolute;
            right: 10px;
            top: 0;
            bottom: 0;
            margin: auto;
            color: #000;
            transform: rotate(90deg);
        }

        #choicelist > div {
            padding: 10px 0px 10px 15px;
        }

        label {
            font-weight: bold;
            font-size: 13px;
            margin-left: 5px;
            margin-bottom: 0;
        }

        input[type="text"] {
            margin: 0px 0px 20px 10px;
        }

        .fa-chevron-down {
            position: absolute;
            right: 1em;
            top: 0.9em;
            color: #a8a8a8;
            transition: transform .2s ease-out, color .2s ease-out;
            font-size: 0.85em;
        }

        .fa-chevron-down--open {
            transform: rotate(-180deg) translate(0, 2px);
            color: #404040;
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
    <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
    <script>
        $(document).ready(function () {
            $('.show_pro_service').on('click', function () {
                $(this).next('.list_services').fadeIn().addClass('active')
                $(this).hide()
                $(this).siblings('.hide_pro_service').show()
            })
            $('.hide_pro_service').on('click', function () {
                $(this).siblings('.show_pro_service').show()
                $(this).prev('.list_services').fadeOut().removeClass('active')
                $(this).hide()
            })

            $(document).on('click', '.btn-lblDBXP', function () {
                if ($(this).attr('aria-expanded') == 'true') {
                    $(this).attr('aria-expanded', 'false')
                    $(this).siblings('fieldset[aria-labelledby=\'lblDBXP\']').find('.fieldset-choicelist').css('display', 'none')
                    $(this).find('.fa-chevron-down').removeClass('fa-chevron-down--open')
                } else {
                    $(this).attr('aria-expanded', 'true')
                    $(this).siblings('fieldset[aria-labelledby=\'lblDBXP\']').find('.fieldset-choicelist').css('display', 'block')
                    $(this).find('.fa-chevron-down').addClass('fa-chevron-down--open')
                }
            })
        })
    </script>
    <script src="{{ theme_url('js/functions/get-total-price.js') }}" defer></script>
    <script>
        $(function () {
            function getParams(id) {
                let services = []
                $(`input[name=\'services_${id}[]\']:checked`).each(function () {
                    services.push($(this).val())
                })
                const urlParams = new URLSearchParams(window.location.search)
                return {
                    services: services,
                    time_start: urlParams.get('time_start') ?? $('input[name=\'time_start\']').val(),
                    time_end: urlParams.get('time_end') ?? $('input[name=\'time_end\']').val(),
                }
            }

            $(document).on('change', 'input[class=\'services\']', function () {
                let params = getParams($(this).attr('product-id'))
                getTotalPrice(
                    $(this).attr('product-id'),
                    params.time_start,
                    params.time_end,
                    params.services,
                    (response) => {
                        $(`#total-price-${$(this).attr('product-id')}`).text(response.data.total_price)
                        $(`#input-total-price-${$(this).attr('product-id')}`).val(response.data.total_price)
                    })
            })

            $(document).on('click', '.btn-submit-booking', function (e) {
                e.preventDefault()
                let params = getParams($(this).attr('product-id'))
                let form = $(this).closest('form.form-booking')
                form.find(`input[name='time_start']`).val(params.time_start)
                form.find(`input[name='time_end']`).val(params.time_end)
                form.find(`input[name='services']`).val(params.services)
                form.submit()
            })

            time_start_date_picker.on('change', function () {
                let params = getParams()
                if (!validateDate(params['time_start'], params['time_end'])) {
                    $('input[name=\'time_start\']').val('')
                    return false
                }
            })

            time_end_date_picker.on('change', function () {
                let params = getParams()
                if (!validateDate(params['time_start'], params['time_end'])) {
                    $('input[name=\'time_end\']').val('')
                    return false
                }
            })

            @if ($message = Session::get(config('core.session_error')))
            $('input[name=\'time_start\']').trigger('click')
            @endif
        })

    </script>

@endpush
