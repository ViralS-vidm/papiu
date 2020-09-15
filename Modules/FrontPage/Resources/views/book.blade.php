@extends('layouts.master')

@section('meta')

    @foreach($configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_BOOK] as $key => $content)
        <meta name="{{ $key }}" content="{{ $content }}">
    @endforeach

@endsection

@section('title') {{ $configCmsFontPage[\Modules\Cms\Entities\MetaCms::KEY_BOOK]['title'] }} @endsection

@section('content')
    <div class="main">
        <div class="bg_book">
            <div class="container">
                {{--                <div class="title_book">--}}
                {{--                    <span>{{ __('frontpage::message.booking_title') }}</span>--}}
                {{--                    <button>Ngày Linh Hoạt?</button>--}}
                {{--                </div>--}}
                @include('components.search_date')
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/book.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style>
        footer {
            display: block;
            margin-top: 0;
        }
    </style>
@endsection

@push('script-extra')
    @include('common-components.functions.toastr')
    <script src="{{ theme_url('js/functions/get-date-now.js') }}" defer></script>
    <script>
        $(function () {
            time_start_date_picker.on('change', function () {
                if (!validateDate($('input[name=\'time_start\']').val(), $('input[name=\'time_end\']').val())) {
                    $('input[name=\'time_start\']').val('')
                    return false
                }
                $('input[name=\'time_end\']').trigger('click')
            })

            time_end_date_picker.on('change', function () {
                if (!validateDate($('input[name=\'time_start\']').val(), $('input[name=\'time_end\']').val())) {
                    $('input[name=\'time_end\']').val('')
                    return false
                }
            })

            @if ($message = Session::get(config('core.session_error')))
            $('input[name=\'time_start\']').trigger('click')
            let navBar = document.getElementById('navBars')
            navBar.scrollIntoView()
            @endif

        })
    </script>
@endpush
