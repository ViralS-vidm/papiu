@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_INDEX] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_INDEX]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div id="content" class="main">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide banner_slider" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="videos">
                            <iframe width="540" height="438"
                                    src="{{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_VIDEO_URL_CMS]->$value }}"
                                    frameborder="0"
                                    class="videosBanner">
                            </iframe>
                        </div>
                        <div class="content_slider">
                            <span
                                class="title">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_VIDEO_TITLE_CMS]->$value !!}</span>
                            <p>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_VIDEO_BRIEF_CMS]->$value !!}</p>
                            <a class="btn-primary-showmore"
                               href="{{ route('frontpage.intro') }}">{{ __('frontpage::message.detail_view_title') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- End .banner -->
        </div>
        <div class="optionHome">
            <div class="container">
                <div class="title_option">
                    <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_MANY_PRODUCT_TITLE_CMS]->$value !!}</h1>
                    <p>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_MANY_PRODUCT_DESCRIPTION_CMS]->$value !!}</p>
                </div>
                <div class="content_home">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($products as $i => $product)
                            <li role="presentation" class="{{ $i == 2 ? 'active' : '' }}">
                                <a href="#product_{{ $product->id }}"
                                   aria-controls="mellow" role="tab"
                                   data-toggle="tab">{{ $product->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($products as $i => $product)
                            <div role="tabpanel" class="tab-pane {{ $i == 2 ? 'active' : '' }}"
                                 id="product_{{ $product->id }}">
                                <div class="imgHome">
                                    <img src="{{ url(@$product->homeImage->first()->original_url) }}" alt=""/>
                                </div>
                                <div class="contentHomeOption">
                                    <div class="left_contentHome">
                                        <span>{{ $product->name }}</span>
                                        <a href="{{ route('frontpage.product-detail',[$product->id]) }}"
                                           class="detailHome">{{ __('frontpage::message.detail_view_title') }}</a>
                                    </div>
                                    <div class=" right_contentHome">
                                        <p>{{ $product->home_intro }}</p>
                                    </div>
                                </div><!-- End .contentHomeOption -->
                            </div>
                        @endforeach
                    </div>
                </div><!-- End .content_home -->
            </div>
        </div><!-- End .optionHome -->
        <div class="oderNow">
            <div class="container">
                <div class="leftTitle">
                    <h1>
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_HOME_TITLE_CMS]->$value !!}
                    </h1>
                </div>
                <div class="rightTitle">
                    <span>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_HOME_DESCRIPTION_CMS]->$value !!}</span>
                    <a class="btn-expensive">
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_HOME_LINK_LABEL_CMS]->$value  !!}</a>
                </div>
            </div>
        </div><!-- End .orderNow -->
        <div class="experienced">
            <div class="container">
                <div class="title_option">
                    <h1>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_IMAGES_TITLE_CMS]->$value !!}</h1>
                    <p>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_IMAGES_DESCRIPTION_CMS]->$value !!}</p>
                </div>
                <ul class="list_experienced">
                    @php
                        $x = 0;
                    @endphp
                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_HOME_IMAGE_HASH_TAG) as $imageHashTag)
                        <li>
                            <img @if($x == 0) id="myImg"
                                 @endif src="{{ asset(@$imageHashTag->imageCms->first()->original_url) }}" alt=""/>
                            <div class="hoverContent">
                                <span>{!! $imageHashTag->hash_tag !!}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a class="view_more">{{ __('frontpage::message.load_more_title') }}</a>
                <a class="hidden_more">{{ __('frontpage::message.hidden_title') }}</a>
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="imgModal">
                </div>
            </div>
        </div><!-- End .experienced -->
        <div class="offer">
            <div class="container">
                <h1>{{ __('frontpage::message.exclusive_title') }}</h1>
                <ul class="list_offer">
                    @foreach($offers as $offer)
                        <li>
                            <img src="{{ url($offer->homeImage->first()->original_url ?? '') }}" alt=""/>
                            <span class="name">{{ $offer->name }}</span>
                            <p>{{ $offer->description }}</p>
                            <a href="{{ route('frontpage.offer') }}">{{ __('frontpage::message.load_more_title') }}</a>
                            <div class="bg_offer"></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><!-- End .offer -->
        <div class="prize">
            <div class="container">
                <h1>{{ __('frontpage::message.prize_title') }}</h1>
                <ul class="list_prize">
                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_HOME_IMAGE_AWARD_CMS) as $imageAward)
                        <li>
                            <div class="imgPrize">
                                <img src="{{ asset(@$imageAward->imageCms->first()->original_url) }}" alt=""/>
                            </div>
                            <h1>{!! $imageAward->name !!}</h1>
                            <span>{!! $imageAward->title !!}</span>
                        </li>
                    @endforeach
                </ul><!-- End .list_prize -->
            </div>
        </div><!-- End .prize -->
        <div class="foodSlide">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php
                            $x = 0;
                        @endphp
                        @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_PANEL_SLIDE) as $slide)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $x }}"
                                class="{{ ($x == 0) ? 'active' : ''}}">
                            @php
                                $x++;
                            @endphp
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @php
                            $x = 1;
                        @endphp
                        @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_PANEL_SLIDE) as $slide)

                            <div class="carousel-item {{ ($x == 1) ? 'active' : ''}}">
                                <img src="{{ asset(@$slide->imageCms->first()->original_url) }}" class="d-block w-100"
                                     alt="{{ $slide->alt }}"/>
                            </div>
                            @php
                                $x++;
                            @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="special">
            <div class="container">
                <div class="title_option">
                    <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_TITLE_CMS]->$value !!}</h1>
                    <p>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_DESCRIPTION_CMS]->$value !!}</p>
                </div>
                <ul class="list_offer">
                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_HOME_EXPERIENCE_SPECIAL_CMS) as $image)
                        <li>
                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}" alt=""/>
                            <span class="name">{!! $image->title !!}</span>
                            <p>{!! $image->description !!}</p>
                        </li>
                    @endforeach
                </ul>
                <a href="/gallery" class="view_more">{{ __('frontpage::message.discover_more_title') }}</a>
            </div>
        </div><!-- End .special -->
    </div>
@endsection

@section('js')
    @include('common-components.functions.toastr')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.view_more').on('click', function () {
                $(this).removeClass('active')
                $(this).hide()
                $(this).next('.hidden_more').addClass('active')
                $(this).parent('.container').find('.list_experienced').addClass('active')
            })
            $('.hidden_more').on('click', function () {
                $(this).removeClass('active')
                $(this).parent('.container').find('.view_more').addClass('active')
                $(this).parent('.container').find('.list_experienced').removeClass('active')
            })
        })
    </script>
@endsection

@push('script-extra')
    <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
    <script>
        $(function () {
            time_start_date_picker.on('change', function () {
                if (!validateDate($('input[name=\'time_start\']').val(), $('input[name=\'time_end\']').val())) {
                    $('input[name=\'time_start\']').val('')
                    return false
                }
                $('input[name=\'time_end\']').trigger('click')
            })

            time_end_date_picker.on('change', function () {
                if (!validateDate($('input[name=\'time_start\']').val(), $('input[name=\'time_end\']').val())) {
                    $('input[name=\'time_end\']').val('')
                    return false
                }
            })

            @if ($message = Session::get(config('core.session_error')))
            $('input[name=\'time_start\']').trigger('click')
            let navBar = document.getElementById('navBars')
            navBar.scrollIntoView()
            @endif

        })
    </script>
@endpush

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style type="text/css">
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 999; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 700px;
            height: 500px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .toast {
            font-size: 22px;
            width: 400px !important;
            opacity: 1 !important;
        }

        .oderNow,
        .experienced {
            display: none;
        }
    </style>
@endsection

