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
    <div id="content" class="main">
        @include('components.search_date')
        <div class="container">
            <div class="overView">
                <div class="leftOver">
                    <h1>{{ __('frontpage::message.over_view_title') }}</h1>
                    <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_OVER_VIEW_SLOGAN_CMS]->$value !!}</span>
                </div><!-- End .leftOver -->
                <div class="rightOver">
                    <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_OVER_VIEW_DESCRIPTION_CMS]->$value !!}</span>
                    <a href="{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_OVER_VIEW_LINK_URL_CMS]->$value !!}"
                       class="btn-expensive">
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_PRODUCT_OVER_VIEW_LINK_LABEL_CMS]->$value !!}</a>
                </div><!-- End .rightOver -->
            </div><!-- End .overView -->
        </div>
        <div class="optionHome">
            <div class="container">
                <div class="content_home">
                    <div class="titleCategory">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">P'apiu</a></li>
                                <li class="breadcrumb-item"><a href="#">Khu Nhà</a></li>
                                <li class="breadcrumb-item" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div><!-- End .titleCategory -->
                    <ul class="nav nav-tabs category_option" role="tablist">
                        @foreach($products as $product)
                            <li role="presentation"
                                class="{{ $products->first()->id == $product->id ? 'active' : '' }}">
                                <a href="#{{ 'product' . $product->id }}"
                                   aria-controls="{{ 'product' . $product->id }}" role="tab"
                                   data-toggle="tab">{{ $product->name }}</a>
                                <span class="bread">{{  $product->name  }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content categorySlide">
                        @foreach($products as $product)
                            <div role="tabpanel"
                                 class="tab-pane {{ $products->first()->id == $product->id ? 'active' : '' }}"
                                 id="{{ 'product' . $product->id }}">
                                <div class="overView">
                                    <div class="leftOver">
                                        <h1>{{ $product->name }}</h1>
                                        <span>{{ __('frontpage::labels.introduce') }}</span>
                                    </div><!-- End .leftOver -->
                                    <div class="rightOver">
                                        <span>{{ $product->cate_intro }}</span>
                                    </div><!-- End .rightOver -->
                                </div><!-- End .overView -->

                                @include('components.slide_detail')

                                <div class="contentHomeOption">
                                    <div class="left_contentHome">
                                        <span>{{ $product->name }}</span>
                                    </div>
                                    <div class="right_contentHome">
                                        <p>
                                            {{ $product->order_title }}
                                        </p>
                                        <a href="{{ route('frontpage.product-detail', [$product->id]) }}"
                                           class="detailHome">{{ __('frontpage::message.booking_now_title') }}</a>
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
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_PRODUCT_LIST_TITLE_CMS]->$value !!}
                    </h1>
                </div>
                <div class="rightTitle">
                    <span>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_PRODUCT_LIST_DESCRIPTION_CMS]->$value !!}</span>
                    <a class="btn-expensive">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_PRODUCT_LIST_LINK_LABEL_CMS]->$value  !!}</a>
                </div>
            </div>
        </div><!-- End .orderNow -->


        <div class="special">
            <div class="container">
                <div class="title_option">
                    <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_TITLE_CMS]->$value !!}</h1>
                    <p>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_DESCRIPTION_CMS]->$value !!}</p>
                </div>
                <ul class="list_offer">
                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS) as $image)
                        <li>
                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}" alt=""/>
                            <span class="name">{!! $image->title !!}</span>
                            <p>{!! $image->description !!}</p>
                        </li>
                    @endforeach
                </ul>
                <a href="/gallery" class="view_more">{{ __('frontpage::message.load_more_title') }}</a>
            </div>
        </div><!-- End .special -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}"></link>
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style>
        .content_home .tab-content .contentHomeOption {
            width: 60%;
        }

        .content_home .tab-content .contentHomeOption a {
            position: initial !important;
            margin-top: 23px;
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
      })
    </script>
@endpush