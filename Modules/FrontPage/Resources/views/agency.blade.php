@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_AGENCY] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_AGENCY]['title'] }} @endsection

@section('content')
    @php
        $value = 'value'. ':' .\Illuminate\Support\Facades\App::getLocale();
        $title = 'title'. ':' .\Illuminate\Support\Facades\App::getLocale();
    @endphp
    <div class="foodSlide">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $x = 0;
                @endphp
                @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_AGENCY_SLIDE_CMS) as $slide)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $x }}" class="{{ ($x == 0) ? 'active' : ''}}">
                    @php
                        $x++;
                    @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $x = 0;
                @endphp
                @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_AGENCY_SLIDE_CMS) as $slide)
                    <div class="carousel-item {{ ($x == 0) ? 'active' : ''}}">
                        <img src="{{ asset(@$slide->imageCms->first()->original_url) }}" class="d-block w-100"
                             alt="{{ $slide->alt }}"/>
                    </div>
                    @php
                        $x++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
    <div class="content_agency">
        <div class="container">
            <h1>{!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_AGENCY_POLICY_TITLE_CMS]->$value !!}</h1>
            {!! $configCms[\Modules\Cms\Entities\ConfigCms::KEY_AGENCY_POLICY_DESCRIPTION_CMS]->$value !!}
        </div>
    </div>
    <div class="oderNow">
        <div class="container">
            <div class="leftTitle">
                <h1>
                    {!! __('frontpage::message.signup_agency') !!}
                </h1>
            </div>
            <div class="rightTitle">
                <a>{{ __('frontpage::message.form_signup_title') }}</a>
            </div>
        </div>
    </div><!-- End .orderNow -->
    <div class="container">
        <div class="slide">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $x = 0;
                    @endphp
                    @foreach($imageCms->where('key', \Modules\Cms\Entities\ImageCms::KEY_AGENCY_SLIDE_FORM_CMS) as $slide)
                        <div class="carousel-item {{ ($x == 0) ? 'active' : ''}}">
                            <img src="{{ asset(@$slide->imageCms->first()->original_url) }}" class="d-block w-100"
                                 alt="{{ $slide->alt }}"/>
                        </div>
                        @php
                            $x++;
                        @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="feedbacks">
            <h1>{{ __('frontpage::message.form_agency_signup') }}</h1>
            <span class="title_agency">Nhập thông tin theo mẫu sau</span>
            <form action="{{ route('frontpage.agencies-create') }}" method="post" class="form-confirm-info">
                @csrf
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.name_form') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.job_title') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="job">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.date_title') }}</label>
                    <div class="form-input">
                        @component('common-components.forms.date-time-picker')
                            @slot('field') dob @endslot
                            @slot('label') {{ __('frontpage::message.date_title') }} @endslot
                            @slot('placeholder') "" @endslot
                        @endcomponent
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.city_title') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="city">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.phone_form') }}</label>
                    <div class="form-input">
                        <input type="number" class="form-control" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.open_apency') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ __('frontpage::message.email_form') }}</label>
                    <div class="form-input">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit"
                            class="btn-primary-send btn-submit-confirm">{{ __('frontpage::message.send_feedback') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/agency.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style>
        .toast {
            font-size: 22px;
            width: 400px !important;
            opacity: 1 !important;
        }

        .form-confirm-info input {
            padding-left: 20px;
        }

        .required {
            border: 2px red solid !important;
        }
    </style>
@endsection

@push('script-extra')
    @include('common-components.functions.toastr')
    <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
    <script src="{{ theme_url('js/functions/validate-phone.js') }}" defer></script>
    <script>
      $(function () {
        $(document).on('click', '.btn-submit-confirm', function (e) {
          e.preventDefault()
          let validated = true
          $('.form-confirm-info input').removeClass('required').each(function (index) {
            if ($(this).val().trim() == '') {
              $(this).addClass('required')
              validated = false
            }
          })

          if (!validated) {
            toastr.warning('{{ __('frontpage::labels.you_must_fill_all') }}')
            let element = document.getElementById('form-confirm-focus')
            element.scrollIntoView()
            return
          }

          if (!validateNumber($(`input[name='phone']`).val().trim())) {
            $(`input[name='phone']`).val('').focus()
            return
          }

          $('.form-confirm-info').submit()
        })

        dob_date_picker.on('change', function () {
          if (!validateDob($(`input[name='dob']`).val())) {
            $('input[name=\'dob\']').val('')
            return false
          }
        })
      })
    </script>
@endpush

