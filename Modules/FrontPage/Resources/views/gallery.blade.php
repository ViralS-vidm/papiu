@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_GALLERY] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_GALLERY]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $description = 'description'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $name = 'name'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="main">
        <div class="top_header">
               <iframe width="560" height="450" src="{{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_TOP_CMS)->first()->source }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="bg_header"></iframe>
               
                <div class="title_gallery">
                    <span>
                        {!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_TOP_CMS)->first()->$description !!}
                    </span>
                </div>
        </div><!-- End .top_header -->
        <div class="optionHome">
            <div class="container">
                <div class="content_home">
                    <div class="titleCategory">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">P'apiu</a></li>
                                <li class="breadcrumb-item"><a href="#">The Gallery</a></li>
                                <li class="breadcrumb-item" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div><!-- End .titleCategory -->
                    <ul class="nav nav-tabs category_option servicesed" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#propose" aria-controls="propose" role="tab"
                               data-toggle="tab">
                                {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_NATURE_CMS]->$value !!}
                            </a>
                            <span
                                class="bread">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_NATURE_CMS]->$value !!}</span>
                        </li>
                        <li role="presentation">
                            <a href="#married" aria-controls="married" role="tab" data-toggle="tab">
                                {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_ARCHITECTURE_CMS]->$value !!}
                            </a>
                            <span
                                class="bread">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_ARCHITECTURE_CMS]->$value !!}</span>
                        </li>
                        <li role="presentation"><a href="#honeymoon" aria-controls="honeymoon" role="tab"
                                                   data-toggle="tab">
                                {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_FOOD_CMS]->$value !!}
                            </a>
                            <span
                                class="bread">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_FOOD_CMS]->$value !!}</span>
                        </li>
                        <li role="presentation"><a href="#gift" aria-controls="gift" role="tab" data-toggle="tab">
                                {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_PEOPLE_CMS]->$value !!}
                            </a>
                            <span
                                class="bread">{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_GALLERY_PEOPLE_CMS]->$value !!}</span>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content categorySlide">
                        <div role="tabpanel" class="tab-pane active" id="propose">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators notOpacity">
                                    @php
                                        $slideCount = 0;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_NATURE_CMS) as $image)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $slideCount }}"
                                            @if($slideCount == 0)class="active"@endif>
                                            <div class="contentText_slide">
                                                <span>{!! $image->name !!}</span>
                                            </div>
                                        </li>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @php
                                        $slideCount = 0;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_NATURE_CMS) as $image)
                                        <div @if($slideCount == 0) class="carousel-item active"
                                             @else class="carousel-item" @endif>
                                            <div class="overView">
                                                <div class="leftOver">
                                                    <h1>{!! $image->title !!}</h1>
                                                </div><!-- End .leftOver -->
                                                <div class="rightOver">
                                                    <span>{!! $image->description !!}</span>
                                                </div>
                                            </div><!-- End .overView -->
                                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}"
                                                 class="d-block w-100" alt=""/>
                                        </div>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="married">
                            <div id="carouselExampleIndicatorses" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators notOpacity">
                                    @php
                                        $slideCount = 0;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_ARCHITECTURE_CMS) as $image)
                                        <li data-target="#carouselExampleIndicatorses" data-slide-to="{{ $slideCount }}"
                                            @if($slideCount == 0)class="active"@endif>
                                            <div class="contentText_slide">
                                                <span>{!! $image->name !!}</span>
                                            </div>
                                        </li>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @php
                                        $slideCount = 0;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_ARCHITECTURE_CMS) as $image)
                                        <div @if($slideCount == 0) class="carousel-item active"
                                             @else class="carousel-item" @endif>
                                            <div class="overView">
                                                <div class="leftOver">
                                                    <h1>{!! $image->title !!}</h1>
                                                </div><!-- End .leftOver -->
                                                <div class="rightOver">
                                                    <span>{!! $image->description !!}</span>
                                                </div>
                                            </div><!-- End .overView -->
                                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}"
                                                 class="d-block w-100" alt=""/>
                                        </div>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="honeymoon">
                            <div id="carouselExampleIndicatorsed" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators notOpacity">
                                    <li data-target="#carouselExampleIndicatorsed" data-slide-to="0" class="active">
                                        <div class="contentText_slide">
                                            <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_ORGANIC_CMS)->first()->$name !!}</span>
                                        </div>
                                    </li>
                                    @php
                                        $slideCount = 1;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_FOOD_CMS) as $image)
                                        <li data-target="#carouselExampleIndicatorsed" data-slide-to="{{ $slideCount }}">
                                            <div class="contentText_slide">
                                                <span>{!! $image->name !!}</span>
                                            </div>
                                        </li>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="overView">
                                            <div class="leftOver">
                                                <h1>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_ORGANIC_CMS)->first()->$title !!}</h1>
                                            </div><!-- End .leftOver -->
                                            <div class="rightOver">
                                                <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_ORGANIC_CMS)->first()->$description !!}</span>
                                            </div>
                                        </div><!-- End .overView -->
                                        <iframe width="560" height="315" src="{{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_ORGANIC_CMS)->first()->source }}"
                                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="bg_header"></iframe>
                                    </div>
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_FOOD_CMS) as $image)
                                        <div class="carousel-item" >
                                            <div class="overView">
                                                <div class="leftOver">
                                                    <h1>{!! $image->title !!}</h1>
                                                </div><!-- End .leftOver -->
                                                <div class="rightOver">
                                                    <span>{!! $image->description !!}</span>
                                                </div>
                                            </div><!-- End .overView -->
                                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}"
                                                 class="d-block w-100" alt=""/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="gift">
                            <div id="carouselExampleIndica" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators notOpacity">
                                    <li data-target="#carouselExampleIndica" data-slide-to="0" class="active">
                                        <div class="contentText_slide">
                                            <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_PEOPLE_CMS)->first()->$name !!}</span>
                                        </div>
                                    </li>
                                    @php
                                        $slideCount = 1;
                                    @endphp
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_PEOPLE_CMS) as $image)
                                        <li data-target="#carouselExampleIndica" data-slide-to="{{ $slideCount }}">
                                            <div class="contentText_slide">
                                                <span>{!! $image->name !!}</span>
                                            </div>
                                        </li>
                                        @php
                                            $slideCount++;
                                        @endphp
                                    @endforeach
                                    <li data-target="#carouselExampleIndica" data-slide-to="{{ $slideCount }}">
                                        <div class="contentText_slide">
                                            <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_COUPLE_CMS)->first()->$name !!}</span>
                                        </div>
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="overView">
                                            <div class="leftOver">
                                                <h1>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_PEOPLE_CMS)->first()->$title !!}</h1>
                                            </div><!-- End .leftOver -->
                                            <div class="rightOver">
                                                <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_PEOPLE_CMS)->first()->$description !!}</span>
                                            </div>
                                        </div><!-- End .overView -->
                                        <iframe width="560" height="315" src="{{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_PEOPLE_CMS)->first()->source }}"
                                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="bg_header"></iframe>
                                    </div>
                                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_GALLERY_PEOPLE_CMS) as $image)
                                        <div class="carousel-item" >
                                            <div class="overView">
                                                <div class="leftOver">
                                                    <h1>{!! $image->title !!}</h1>
                                                </div><!-- End .leftOver -->
                                                <div class="rightOver">
                                                    <span>{!! $image->description !!}</span>
                                                </div>
                                            </div><!-- End .overView -->
                                            <img src="{{ asset(@$image->imageCms->first()->original_url) }}"
                                                 class="d-block w-100" alt=""/>
                                        </div>
                                    @endforeach
                                    <div class="carousel-item">
                                        <div class="overView">
                                            <div class="leftOver">
                                                <h1>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_COUPLE_CMS)->first()->$title !!}</h1>
                                            </div><!-- End .leftOver -->
                                            <div class="rightOver">
                                                <span>{!! $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_COUPLE_CMS)->first()->$description !!}</span>
                                            </div>
                                        </div><!-- End .overView -->
                                        <iframe width="560" height="315" src="{{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_COUPLE_CMS)->first()->source }}"
                                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="bg_header"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End .content_home -->
        </div>
        <div class="videoGallery">
            <div class="container">
                <div class="title_gallery">
                    <span>
                        {{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_BOTTOM_CMS)->first()->description }}
                    </span>
                </div>
                <div class="gallery_video">
                    <iframe width="560" height="315" src="{{ $videos->where('key', \Modules\Cms\Entities\VideoCms::KEY_GALLERY_VIDEO_BOTTOM_CMS)->first()->source }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="bg_header"></iframe>
                </div>
            </div>
        </div>
        <div class="oderNow">
            <div class="container">
                <div class="leftTitle">
                    <h1>
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_GALLERY_TITLE_CMS]->$value !!}
                    </h1>
                </div>
                <div class="rightTitle">
                    <span>{!!  $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_GALLERY_DESCRIPTION_CMS]->$value !!}</span>
                    <a href="{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_GALLERY_LINK_URL_CMS]->$value  !!}">
                        {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_BOOKING_GALLERY_LINK_LABEL_CMS]->$value  !!}
                    </a>
                </div>
            </div>
        </div><!-- End .orderNow -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/styles.css') }}">

@endsection
