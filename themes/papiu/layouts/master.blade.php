<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ theme_url('images/Logo.png') }}" type="image/png">
    @yield('meta')
    <title>@yield('title')</title>
    @include('layouts.head')
</head>
<body>
<div id="page">
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <header class="header">
        @if (Request::path() == '/')
            <div class="top_header">
                <video autoplay="" loop="" playsinline="" muted="" class="bg_header">
                    <source
                        src="{{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_HOME_VIDEO_BACKGROUND_URL_CMS]->$value }}"
                        type="video/mp4">
                </video>
                <img
                    src="{{ asset(@$logoCms[\Modules\Cms\Entities\ImageCms::KEY_SITE_LOGO_WHITE]->imageCms->first()->original_url) }}"
                    alt="" class="logo_header"/>
                <div class="icon_loadmore">
                    <a href="#navBars" class="scrollDrop">
                        <img src="{{ theme_url('images/Vector.png') }}" alt="" id="scrollMain"/>
                    </a>
                    <a href="{{ route('frontpage.gallery') }}">{{ __('frontpage::message.load_more_title') }}</a>
                </div>
            </div><!-- End .top_header -->
        @endif
        <nav class="navbar navbar-expand-lg navbar-light" id="navBars">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img
                        src="{{ asset(@$logoCms[\Modules\Cms\Entities\ImageCms::KEY_SITE_LOGO]->imageCms->first()->original_url) }}"
                        alt="" class="logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Trang chủ -->
                        @if (!Request::is('/'))
                            <li class="nav-item @if(request()->route()->getName() == 'frontpage.home') active @endif">
                                <a class="nav-link"
                                   href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_HOME_CMS]->$value) }}">
                                    {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_HOME_CMS]->$title }}
                                </a>
                            </li>
                    @endif
                    <!-- Về P'apiu -->
                        <li class="nav-item @if(request()->route()->getName() == 'frontpage.intro') active @endif">
                            <a class="nav-link"
                               href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_ABOUT_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_ABOUT_CMS]->$title }}
                            </a>
                        </li>
                        <!-- Khu Nhà -->
                        <li class="nav-item dropdown @if(request()->route()->getName() == 'frontpage.products') active @endif">
                            <a class="nav-link"
                               href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_CMS]->$title }}
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a
                                        href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_MELLOW_CMS]->$value) }}">
                                        {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_MELLOW_CMS]->$title }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_FLUFFY_CMS]->$value) }}">
                                        {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_FLUFFY_CMS]->$title }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_LAYLA_CMS]->$value) }}">
                                        {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CATEGORY_LAYLA_CMS]->$title }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Dịch vụ -->
                        <li class="nav-item @if(request()->route()->getName() == 'frontpage.service') active @endif">
                            <a class="nav-link"
                               href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_SERVICE_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_SERVICE_CMS]->$title }}
                            </a>
                        </li>
                        <!-- Ưu đãi -->
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_OFFER_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_OFFER_CMS]->$title }}
                            </a>
                        </li>
                        <!-- Gallery -->
                        <li class="nav-item @if(request()->route()->getName() == 'frontpage.gallery') active @endif">
                            <a class="nav-link"
                               href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_GALLERY_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_GALLERY_CMS]->$title }}
                            </a>
                        </li>
                    </ul>
                    <a class="btn-primary-contact"
                       href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CONTACT_NOW_CMS]->$value) }}">
                        {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_CONTACT_NOW_CMS]->$title }}
                    </a>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5">
                    <img
                        src="{{ asset(@$logoCms[\Modules\Cms\Entities\ImageCms::KEY_SITE_LOGO]->imageCms->first()->original_url) }}"
                        alt="" class="logo_footer"/>
                    <ul class="list_contact">
                        <li>
                            <img src="{{ theme_url('images/Shape.png') }}" alt=""/>
                            <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_SITE_ADDRESS]->$value !!}</span>
                        </li>
                        <li>
                            <img src="{{ theme_url('images/ic_call.png') }}" alt=""/>
                            <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_SITE_PHONE]->$value !!}</span>
                        </li>
                        <li>
                            <img src="{{ theme_url('images/mail.png') }}" alt=""/>
                            <span>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_SITE_EMAIL]->$value !!}</span>
                        </li>
                    </ul><!-- End .list_contact -->
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="list_footer">
                        <li>
                            <a href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_BOOKING_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_BOOKING_CMS]->$title }}</a>
                        </li>
                        <li>
                            <a href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_GALLERY_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_GALLERY_CMS]->$title }}</a>
                        </li>
                        <li>
                            <a href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_ABOUT_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_ABOUT_CMS]->$title }}</a>
                        </li>
                        <li>
                            <a href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_AGENCY_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_AGENCY_CMS]->$title }}</a>
                        </li>
                        <li>
                            <a href="{{ url($configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_CONTACT_CMS]->$value) }}">
                                {{ $configCms[\Modules\Cms\Entities\ConfigCms::KEY_MENU_FOOTER_CONTACT_CMS]->$title }}</a>
                        </li>
                    </ul><!-- End .list_footer -->
                </div>
                <div class="col-12 col-sm-12 col-md-3">
                    <ul class="verify">
                        <li>
                            <img src="{{ theme_url('images/Bitmap.png') }}" alt=""/>
                        </li>
                        <li>
                            <span>{{ __('frontpage::message.support_payment_title') }}</span>
                            <ol>
                                <li>
                                    <img src="{{ theme_url('images/Bitmap1.png') }}" alt=""/>

                                </li>
                                <li>
                                    <img src="{{ theme_url('images/Bitmap2.png') }}" alt=""/>

                                </li>
                                <li>
                                    <img src="{{ theme_url('images/Bitmap3.png') }}" alt=""/>

                                </li>
                                <li>
                                    <img src="{{ theme_url('images/Bitmap4.png') }}" alt=""/>

                                </li>
                            </ol>
                        </li>
                        <li>
                            <span>{{ __('frontpage::message.follow_me_title') }}</span>
                            <ol>
                                <li>
                                    <a href="https://www.facebook.com/papiuresort/">
                                        <img src="{{ theme_url('images/fb.png') }}" alt=""/>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/khu-ngh%E1%BB%89-d%C6%B0%E1%BB%A1ng-p-apiu-5a64151b2/">
                                        <img src="{{ theme_url('images/linkedin.png') }}" alt=""/>
                                    </a>
                                </li>
                                <li>
                                    <a href=" https://www.instagram.com/papiuresort/">
                                        <img src="{{ theme_url('images/ins.png') }}" alt=""/>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/apiu_p/">
                                        <img src="{{ theme_url('images/twitter.png') }}" alt=""/>
                                    </a>
                                </li>
                                <li>
                                    <a href=" https://www.youtube.com/channel/UCUjOi-PK6eJce4TzvbMQr1Q/featured">
                                        <img src="{{ theme_url('images/you.png') }}" alt=""/>
                                    </a>
                                </li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- End .footer-->
        <div class="copyright">
            <div class="container">
                <span>Đã đăng ký giấy phép kinh doanh số 123456789 ngày 12/12/2019 do Bộ Công thương Hà Nội cung câp</span>
                <div class="private">
                    <a href="{{ route('frontpage.policy') }}">{{ __('frontpage::message.policy_privacy_title') }}</a>
                    <a href="{{ route('frontpage.condition') }}">{{ __('frontpage::message.term_condition_title') }}</a>
                </div>
            </div>
        </div><!-- End .copyright-->
    </footer>
    <div class="hotline">
        <a href="tel:02193841999">
            <img src="{{ theme_url('images/phone.png') }}" alt=""/>
        </a>
    </div>
    <div class="hotbooking">
        <a href="{{ route('frontpage.book') }}">
            <img src="{{ theme_url('images/calendar.png') }}" alt=""/>
        </a>
    </div>
</div>
{{-- Laravel Mix - JS File --}}
{{-- <script src="{{ mix('js/frontpage.js') }}"></script> --}}
@include('layouts.footer-script')
</body>
</html>
