@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_POLICY] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_POLICY]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="foodSlide">
        <div class="imgFood">
            <img src="{{ theme_url('images/contact.jpg') }}" class="d-block w-100" alt=""/>
        </div>
    </div>
    <div class="container">
        <div class="content_policy">
            <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_POLICY_TITLE_CMS]->$value !!}</h1>
            {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_POLICY_DESCRIPTION_CMS]->$value !!}
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/policy.css') }}">
@endsection
