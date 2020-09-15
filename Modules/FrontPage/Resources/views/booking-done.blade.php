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
                    <h1>{{ __('frontpage::message.confirm_infomation') }}</h1>
                </div>
                <div class="thanks">
                    <span>{{ __('frontpage::message.thank_title') }}</span>
                </div>
                <div class="content_account">
                    <div class="left">
                        <ul class="list_infomationAccount">
                            <li>
                                <span class="title_list">{{ __('frontpage::message.name_form') }}</span>
                                <p>{{ $contact_name }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.phone_form') }}</span>
                                <p>{{ $contact_number }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.email_form') }}</span>
                                <p>{{ $contact_email }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.address_form') }}</span>
                                <p>{{ $address }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.start_date') }}</span>
                                <p>{{$time_start }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.end_date') }}</span>
                                <p>{{ $time_end }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.option_home') }}</span>
                                <p>{{ $product_name }}</p>
                            </li>
                            <li>
                                <span class="title_list">{{ __('frontpage::message.service_combo') }}</span>
                                <p>{{ $services_combo }}</p>
                            </li>
                        </ul><!-- End .list_infomationAccount -->
                    </div>
                    <div class="right">
                        <img src="{{ url($url_home)  }}" alt=""/>
                    </div>
                </div><!-- ENd .content_account -->
                <span class="note">{{ __('frontpage::labels.book_success') }}</span>

                <div class="title">
                    <a href="/" style="width: 200px;">
                        <img src="{{ theme_url('images/icon_back.png') }}" alt=""/>
                        {{ __('frontpage::message.back_home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/booking_list.css') }}">
@endsection
