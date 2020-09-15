@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_PRODUCT] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_PRODUCT]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="main">
        <div class="container">
            <div class="infomationDetail">
                <div class="leftDetail">
                    <div class="carousel">
                        @foreach($product->detailImages as $image)
                            <div>
                                <img src="{{ url($image->original_url) }}" alt=""/>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($product->detailImages as $image)
                            <div>
                                <img src="{{ url($image->thumbnail_url) }}" alt=""/>
                            </div>
                        @endforeach
                    </div>
                    <ul class="infomationBook">
                        <li>
                            <img src="{{ theme_url('images/bed-09.png') }}" alt=""/>
                            <span>{{ $product->num_bedroom }} {{ __('frontpage::labels.bedroom') }}</span>
                        </li>
                        <li>
                            <img src="{{ theme_url('images/armchair.png') }}" alt=""/>
                            <span>{{ $product->num_lounge }} {{ __('frontpage::labels.lounge') }}</span>
                        </li>
                        <li>
                            <img src="{{ theme_url('images/bath-thub.png') }}" alt=""/>
                            <span>{{ $product->num_bathroom }} {{ __('frontpage::labels.bathroom') }}</span>
                        </li>
                        @if ($product->id == 3)
                            <li>
                                <img src="{{ theme_url('images/minibar.jpg') }}" alt=""/>
                                <span>{{ $product->num_bathroom }} {{ __('frontpage::labels.mini_bar') }}</span>
                            </li>
                            <li>
                                <img src="{{ theme_url('images/cinema.jpg') }}" alt=""/>
                                <span>{{ $product->num_bathroom }} {{ __('frontpage::labels.cinemar_title') }}</span>
                            </li>
                        @endif
                    </ul>
                </div><!-- End .leftDetail -->
                <div class="rightDetail">
                    <form action="{{ route('frontpage.confirm-personal') }}" method="post" id="booking-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" id="input-total-price-{{ $product->id }}" name="total_price" value="">
                        <ul class="titleForm">
                            <li>
                                <h1>{{ $product->name }}</h1>
                            </li>
                            <li class="price">
                                <span>{{ format_currency($product->price_per_day) . get_currency() }}</span>
                                <strong>/</strong>
                                <p>{{ __('frontpage::labels.night') }}</p>
                            </li>
                        </ul>
                        <div class="contentForm">
                            <div class="dropdown days">
                                <span>{{ __('frontpage::labels.chose_start_date_stay') }}</span>
                                <a class="btn btn-secondary dropdown-toggle"  role="button" aria-haspopup="true"
                                   aria-expanded="false">
                                    @component('common-components.forms.date-time-picker')
                                        @slot('field') time_start @endslot
                                        @slot('label') {{ __('booking::labels.time_start') }} @endslot
                                        @slot('placeholder') {{ __('booking::labels.time_start') }} @endslot
                                    @endcomponent
                                </a>
                            </div>

                            <div class="dropdown days">
                                <span>{{ __('frontpage::labels.chose_end_date_stay') }}</span>
                                <a class="btn btn-secondary dropdown-toggle"  role="button" aria-haspopup="true"
                                   aria-expanded="false">
                                    @component('common-components.forms.date-time-picker')
                                        @slot('field') time_end @endslot
                                        @slot('label') {{ __('booking::labels.time_end') }} @endslot
                                        @slot('placeholder') {{ __('booking::labels.time_end') }} @endslot
                                    @endcomponent
                                </a>
                            </div>
                        </div>
                        <div class="Accompanied">
                            <div class="title">
                                <span>{{ __('frontpage::labels.service_accompanied') }}</span>
                            </div>
                            @foreach($services as $service)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1 col-sm-1">
                                            <input type="checkbox" name="services[]" value="{{ $service->id }}">
                                        </div>
                                        <div class="col-7 col-sm-8" style="text-align: justify">
                                            <span>{{ $service->name }}</span>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <p class="price"
                                               style="width: 120%; text-align: right; display: inline">{{ format_currency($service->price) . get_currency() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End .Accompanied  -->
                        <div class="totalPrice">
                            <div class="title">
                                <span>{{ __('frontpage::labels.total_price') }}</span>
                                <h3><span id="booking-total-price">0</span> {{ get_currency() }}</h3>
                            </div>
                            <button type="submit"
                                    class="btn-primary-book">{{ __('frontpage::labels.booking') }}</button>
                        </div><!-- End .totalPrice -->
                    </form>
                </div><!-- End .rightDetail -->
            </div><!-- End .infomation Detail -->
        </div>
        <div>
            <div class="container">
                <div class="tab-content categorySlide">
                    <div class="overView">
                        <div class="leftOver">
                            <h1>{{ $product->name }}</h1>
                            <span>{{ __('frontpage::message.introduction_title') }}</span>
                        </div><!-- End .leftOver -->
                        <div class="rightOver">
                            <span>{{ $product->detail_overview }}</span>
                            <a href="#" class="btn-expensive">{{ __('frontpage::message.booking_now_title') }}</a>
                        </div><!-- End .rightOver -->
                    </div><!-- End .overView -->
                    @include('components.slide_detail')
                </div>
            </div>

            <div class="oderNow">
                <div class="container">
                    <div class="leftTitle">
                        <h1>
                            {!! __('frontpage::labels.order_now') !!}
                        </h1>
                    </div>
                    <div class="rightTitle">
                        <span>{{  $product->order_title }}</span>
                        <a href="#" class="btn-expensive">{{ __('frontpage::message.booking_now_title') }}</a>
                    </div>
                </div>
            </div><!-- End .orderNow -->


            @include('components.services')


            <div class=optionBooking>
                <div class="container">
                    <h1 class="title">{{ __('frontpage::labels.other_products') }}</h1>
                    <ul class="list_optionBooking">
                        @foreach($otherProducts as $product)
                            <li class="left_optionBook">
                                <img src="{{ url(@$product->homeImage->first()->original_url) }}" alt=""/>
                                <div class="content_option">
                                    <div class="left">
                                        <h1>{{ $product->name }}</h1>
                                        <span>{{ __('frontpage::labels.introduce') }}</span>
                                    </div>
                                    <div class="right">
                                        <span>{{ $product->detail_brief }}</span>
                                        <a href="{{ route('frontpage.product-detail', [$product->id]) }}"
                                           class="load_more">{{ __('frontpage::message.load_more_title') }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul><!-- End .list_optionBooking -->
                </div>
            </div>
            <div class="container">
                <div class="overView">
                    <div class="leftOver">
                        <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_TITLE_CMS]->$value !!}</h1>
                        <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_BRIEF_CMS]->$value !!}</span>
                    </div><!-- End .leftOver -->
                    <div class="rightOver">
                        <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_DESCRIPTION_CMS]->$value !!}</span>
                        <a href="{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_LINK_URL_CMS]->$value !!}" class="btn-expensive">
                            {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_LINK_LABEL_CMS]->$value !!}</a>
                    </div><!-- End .rightOver -->
                </div><!-- End .overView -->
            </div>
        </div><!-- End .main -->
        @endsection
        @section('js')
            <script src="{{ theme_url('js/slick.min.js') }}" defer></script>
            <script src="{{ theme_url('js/slick.js') }}" defer></script>

        @endsection
        @section('css')
            <link rel="stylesheet" type="text/css" href="{{ theme_url('css/detail.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ theme_url('css/slick.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ theme_url('css/slick-theme.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
            <style>
                .toast {
                    font-size: 22px;
                    width: 400px !important;
                    opacity: 1 !important;
                }
            </style>
        @endsection

        @push('script-extra')
            <script src="{{ theme_url('js/functions/get-total-price.js') }}" defer></script>
            <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
            @include('common-components.functions.toastr')
            <script>
                $(function () {
                    function getParams() {
                        let services = []
                        $('input[name=\'services[]\']:checked').each(function () {
                            services.push($(this).val())
                        })
                        return {
                            services: services,
                            time_start: $('input[name=\'time_start\']').val(),
                            time_end: $('input[name=\'time_end\']').val(),
                        }
                    }

                    $(document).on('change', 'input[name=\'services[]\']', function () {
                        let params = getParams()
                        getTotalPrice(
                            '{{ $product->id }}',
                            params.time_start,
                            params.time_end,
                            params.services,
                            (response) => {
                                $('#booking-total-price').text(response.data.total_price)
                                $('input[name=\'total_price\']').val(response.data.total_price)
                            }
                        )
                    })

                    time_start_date_picker.on('change', function () {
                        let params = getParams()
                        if (!validateDate(params['time_start'], params['time_end'])) {
                            $('input[name=\'time_start\']').val('')
                            return false
                        }
                        getTotalPrice(
                            '{{ $product->id }}',
                            params['time_start'],
                            params['time_end'],
                            params['services'],
                            (response) => {
                                $('#booking-total-price').text(response.data.total_price)
                                $('input[name=\'total_price\']').val(response.data.total_price)
                            }
                        )
                    })

                    time_end_date_picker.on('change', function () {
                        let params = getParams()
                        if (!validateDate(params['time_start'], params['time_end'])) {
                            $('input[name=\'time_end\']').val('')
                            return false
                        }
                        getTotalPrice(
                            '{{ $product->id }}',
                            params['time_start'],
                            params['time_end'],
                            params['services'],
                            (response) => {
                                console.log(response.data.total_price)
                                $('#booking-total-price').text(response.data.total_price)
                                $('input[name=\'total_price\']').val(response.data.total_price)
                            })
                    })
                })

            </script>
    @endpush
