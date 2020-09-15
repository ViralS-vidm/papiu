@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_AGENCY] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_AGENCY]['title'] }} @endsection

@section('content')
    <div class="container">
        <div class="message-user">
            <h1>{{ __('frontpage::message.create_agency_done') }}</h1>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/contact.css') }}">
    <style>
        .message-user {
            margin-top: 30px;
        }
    </style>
@endsection
