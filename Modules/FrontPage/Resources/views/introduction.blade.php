@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_INTRODUCTION] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_INTRODUCTION]['title'] }} @endsection

@section('content')
    <div class="foodSlide services">
        <div class="imgFood">
            <img src="{{ theme_url('images/contact.jpg') }}" class="d-block w-100" alt=""/>
            <span class="title_experience">{{ __('frontpage::message.experience_vr') }}</span>
        </div>
        <div class="categorySlide">
            <div class="overView">
                <div class="leftOver">
                    <h1>{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_OVERVIEW_CMS) }}</h1>
                </div><!-- End .leftOver -->
            </div><!-- End .overView -->
        </div>
        <div class="infomation_servies">
            {!! valueByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_OVERVIEW_CMS) !!}
        </div>
    </div>
    <div class="optionHome">
        <div class="container">
            <div class="content_home">
                <div class="titleCategory">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">P'apiu</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('frontpage::labels.about_title') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"></li>
                        </ol>
                    </nav>
                </div><!-- End .titleCategory -->
                <ul class="nav nav-tabs category_option servicesed" role="tablist">
                    <li role="presentation" class="active"><a href="#propose" aria-controls="propose" role="tab"
                                                              data-toggle="tab">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_MOVE_CMS) }}</a>
                        <span
                            class="bread">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_MOVE_CMS) }}</span>
                    </li>
                    <li role="presentation"><a href="#married" aria-controls="married" role="tab"
                                               data-toggle="tab">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_UTILITIES_CMS) }}</a>
                        <span
                            class="bread">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_UTILITIES_CMS) }}</span>
                    </li>
                    <li role="presentation"><a href="#honeymoon" aria-controls="honeymoon" role="tab"
                                               data-toggle="tab">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_REVIEW_TITLE_CMS) }}</a>
                        <span
                            class="bread">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_REVIEW_TITLE_CMS) }}</span>
                    </li>
                    <li role="presentation"><a href="#gift" aria-controls="gift" role="tab"
                                               data-toggle="tab">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_REWARD_TITLE_CMS) }}</a>
                        <span
                            class="bread">{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_REWARD_TITLE_CMS) }}</span>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content categorySlide">
                    <div role="tabpanel" class="tab-pane active" id="propose">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16334.06770046352!2d105.10713808584237!3d22.805708282790466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cb87a4110b3ca3%3A0xdeb65095c70d188d!2zS2h1IG5naMSpIGTGsOG7oW5nIFAnYXBpdQ!5e1!3m2!1sen!2s!4v1594719581499!5m2!1sen!2s"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                        <div class="overView">
                            <div class="leftOver">
                                <h1>{{ titleByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_MOVE_CMS) }}</h1>
                            </div><!-- End .leftOver -->
                        </div><!-- End .overView -->
                        <div class="infomation_servies">
                            {!! valueByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_MOVE_CMS) !!}
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="married">
                        <ul class="list_services">
                            @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_INTRODUCTION_SERVICE_UTILITIES) as $image)
                                <li>
                                    <img src="{{ asset(@$image->imageCms->first()->original_url) }}" alt=""/>
                                    <span>{{ $image->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="honeymoon">
                        <ul class="list_servicesed">
                            @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_INTRODUCTION_REVIEW) as $image)
                                <li>
                                    <img src="{{ asset(@$image->imageCms->first()->original_url) }}" alt=""/>
                                    <span>{{ $image->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="overView">
                            <div class="rightOver">
                                <span>{{ valueByKey($config, \Modules\Cms\Entities\ConfigCms::KEY_INTRODUCTION_REVIEW_TITLE_CMS) }}</span>
                            </div>
                        </div><!-- End .overView -->
                    </div>
                    <div role="tabpanel" class="tab-pane" id="gift">
                        <div class="prize">
                            <div class="container">
                                <h1>{{ __('frontpage::message.prize_title') }}</h1>
                                <ul class="list_prize">
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_HOME_IMAGE_AWARD_CMS) as $imageAward)
                                        <li>
                                            <div class="imgPrize">
                                                <img src="{{ asset(@$imageAward->imageCms->first()->original_url) }}"
                                                     alt=""/>
                                            </div>
                                            <h1>{!! $imageAward->name !!}</h1>
                                            <span>{!! $imageAward->title !!}</span>
                                        </li>
                                    @endforeach
                                </ul><!-- End .list_prize -->
                            </div>
                        </div><!-- End .prize -->
                    </div>
                </div>
            </div>
        </div><!-- End .content_home -->
    </div>
    </div><!-- End .optionHome -->
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/services.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/introdution.css') }}">
@endsection
