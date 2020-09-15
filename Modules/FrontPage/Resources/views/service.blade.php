@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_SERVICE] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_SERVICE]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="main">
        <div class="container">
            <div class="overView services">
                <div class="leftOver">
                    <h1>{{ $config[\Modules\Cms\Entities\ConfigCms::KEY_SERVICE_TITLE_CMS] }}</h1>
                </div><!-- End .leftOver -->
                <div class="rightOver">
                    <span>{!! $config[\Modules\Cms\Entities\ConfigCms::KEY_SERVICE_DESCRIPTION_CMS] !!}</span>
                </div><!-- End .rightOver -->
            </div><!-- End .overView -->
            <div class="foodSlide services">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($slides as $key => $slide)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                class="{{ ($key == 0) ? 'active' : ''}}">
                                {{--                        <div class="contentText_slide">--}}
                                {{--                            <span>Food</span>--}}
                                {{--                        </div>--}}
                            </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($slides as $key => $slide)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : ''}}">
                                <img src="{{ asset(@$slide->imageCms->first()->original_url) }}" class="d-block w-100"
                                     alt="{{ $slide->alt }}"/>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="services_list">
                <h1>{{ __('frontpage::message.services_title') }}</h1>
                {!! $config[\Modules\Cms\Entities\ConfigCms::KEY_SERVICE_LIST_SERVICE_CMS] !!}
                <a href="{{ route('frontpage.service') }}">
                    <button type="button" class="button">{{ __('frontpage::message.discover_more_travel') }}</button>
                </a>
            </div>
        </div>
        <div class="oderNow">
            <div class="container">
                <div class="leftTitle">
                    <h1>
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_TITLE_CMS]->$value !!}
                    </h1>
                </div>
                <div class="rightTitle">
                    <span>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_DESCRIPTION_CMS]->$value !!}</span>
                    <a href="{{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_LINK_URL_CMS]->$value }}">
                        {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_LINK_LABEL_CMS]->$value }}</a>
                </div>
            </div>
        </div><!-- End .orderNow -->
        <div class="optionHome">
            <div class="container">
                <div class="content_home">
                    <div class="titleCategory">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">P'apiu</a></li>
                                <li class="breadcrumb-item"><a
                                        href="#">{{ __('frontpage::message.services_title') }}</a></li>
                                <li class="breadcrumb-item" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div><!-- End .titleCategory -->
                    <ul class="nav nav-tabs category_option servicesed" role="tablist">
                        @foreach($services as $i => $service)
                            <li role="presentation" class="{{ $i == 0 ? 'active' : '' }}">
                                <a href="#service-{{ $service->id }}"
                                   aria-controls="service-{{ $service->id }}"
                                   role="tab"
                                   data-toggle="tab">{{ $service->name }}
                                </a>
                                <span class="bread">{{ $service->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content categorySlide">

                        @foreach($services as $i => $service)
                            <div role="tabpanel" class="tab-pane {{ $i == 0 ? 'active' : '' }}"
                                 id="service-{{ $service->id }}">
                                <div class="imgHome">
                                    <img src="{{ url($service->homeImage->first()->original_url ?? '/fake.png') }}"
                                         alt=""/>
                                </div>
                                <div class="overView">
                                    <div class="leftOver">
                                        <h1>{{ $service->name }}</h1>
                                    </div><!-- End .leftOver -->
                                </div><!-- End .overView -->
                                <div class="infomation_servies">
                                    {!! $service->detail !!}
                                    <form action="{{ route('frontpage.service-confirm-view') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        <input type="hidden" name="service_name" value="{{ $service->name }}">
                                        <button type="submit"
                                                class="btn-primary-book">{{ __('frontpage::message.booking_services_title') }}</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- End .content_home -->
        </div>
    </div><!-- End .optionHome -->
    </div><!-- End .main -->
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/services.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/detail.css') }}">
@endsection
