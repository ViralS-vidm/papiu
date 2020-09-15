@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_OFFER] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_OFFER]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="container">
        <div class="overView">
            <div class="leftOver">
                <h1>{{ __('frontpage::message.introduction_all_title') }}</h1>
            </div><!-- End .leftOver -->
            <div class="rightOver">
                <span>Với những ưu đãi độc quyền, P'apiu hy vọng sẽ mang đến cho du khách những trải nghiệm tuyệt vời độc nhất và kỳ nghỉ hoàn hảo nhất!</span>
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
                            <li class="breadcrumb-item" aria-current="page"></li>
                        </ol>
                    </nav>
                </div><!-- End .titleCategory -->
                <ul class="nav nav-tabs category_option servicesed" role="tablist">
                    @foreach($offers as $i => $offer)
                        <li role="presentation" class="{{ $i == 0 ? 'active' : '' }}">
                            <a href="#offer-{{ $offer->id }}"
                               aria-controls="offer-{{ $offer->id }} }}"
                               role="tab"
                               data-toggle="tab">{{ $offer->name }}</a>
                            <span class="bread">{{ $offer->name }}</span>
                        </li>
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content categorySlide">
                    @foreach($offers as $i => $offer)
                        <div role="tabpanel" class="tab-pane {{ $i == 0 ? 'active' : '' }}"
                             id="offer-{{ $offer->id }}">
                            <form action="{{ route('frontpage.offer-confirm-view') }}" method="post">
                                @csrf
                                <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                                <input type="hidden" name="offer_name" value="{{ $offer->name }}">
                                <div class="imgHome">
                                    <img src="{{ url($offer->homeImage->first()->original_url ?? '') }}" alt=""/>
                                </div>
                                <div class="overView">
                                    <div class="leftOver">
                                        <h1>{{ $offer->name }}</h1>
                                    </div><!-- End .leftOver -->
                                    <div class="infomation_servies">
                                        <ul class="content_detail">
                                            {!! $offer->content !!}
                                        </ul>
                                        <button type="submit" class="btn btn-confirm-offer">
                                            <span class="btn-expensive">{{ __('frontpage::message.take_offer') }}</span>
                                        </button>
                                    </div>
                                </div><!-- End .overView -->
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- End .content_home -->
    </div>
    <div class="oderNow">
        <div class="container">
            <div class="leftTitle">
                <h1>
                    {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_OFFER_TITLE_CMS]->$value !!}
                </h1>
            </div>
            <div class="rightTitle">
                <span>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_OFFER_DESCRIPTION_CMS]->$value !!}</span>
                <a href="{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_OFFER_LINK_URL_CMS]->$value  !!}">
                    {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_OFFER_LINK_LABEL_CMS]->$value  !!}
                </a>
            </div>
        </div>
    </div><!-- End .orderNow -->



@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}"></link>
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/offers.css') }}"></link>
    <style>
        .btn-confirm-offer {
            border: none;
            background-color: #ffffff;
        }
    </style>
@endsection
