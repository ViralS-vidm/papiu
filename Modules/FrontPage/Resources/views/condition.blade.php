@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_CONDITION] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_CONDITION]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $alt = 'alt'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $imageCondition = $imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_CONDITION_CMS)->first();
    @endphp
    <div class="foodSlide">
        <div class="imgFood">
            <img src="{{ $imageCondition->imageCms->first()->original_url }}" class="d-block w-100"
                 alt="{{ $imageCondition->$alt }}"/>
        </div>
    </div>
    <div class="container">
        <div class="content_policy">
            <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_CONDITION_TITLE_CMS]->$value !!}</h1>
            {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_CONDITION_DESCRIPTION_CMS]->$value !!}
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/policy.css') }}">
@endsection
