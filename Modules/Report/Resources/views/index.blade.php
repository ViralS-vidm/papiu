@extends('layouts.admin.master')

@section('title') {{ __('report::labels.report') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('report::labels.report') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('report::labels.report') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($currentTime ,['route' => 'report.index', 'method'=>'GET', 'class' => 'outer-repeater']) }}
                    <div data-repeater-list="outer-group" class="outer row">
                        <div class="col-md-5">
                            @component('common-components.forms.select', [
                            'options' => $months,
                            'props' => ['class' => 'select2']
                            ])
                                @slot('field') month @endslot
                                @slot('label') {{ __('report::labels.month') }} @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-5">
                            @component('common-components.forms.select', [
                                                        'options' => $years,
                                                        'props' => ['class' => 'select2']
                                                        ])
                                @slot('field') year @endslot
                                @slot('label') {{ __('report::labels.year') }} @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-2">
                            <button type="submit"
                                    class="btn btn-primary btn-sm">{{ __('report::labels.filter') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">{{ __('report::labels.month_revenue') }} {{ $currentTime->month }}
                        /{{ $currentTime->year }} </h2>

                    @if($monthRevenue)
                        <div class="row mb-4">
                            <div class="col-lg-6 align-middle">
                                <table class="table table-responsive">
                                    <tr>
                                        <td>{{ __('report::labels.total_revenue') }}</td>
                                        <td>{{ format_currency($monthRevenue->total_revenue) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.room_booking') }}</td>
                                        <td>{{ format_currency($monthRevenue->room_booking_count) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.room_revenue') }}</td>
                                        <td>{{ format_currency($monthRevenue->room_revenue) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.service_booking') }}</td>
                                        <td>{{ format_currency($monthRevenue->service_booking_count) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.service_revenue') }}</td>
                                        <td>{{ format_currency($monthRevenue->service_revenue) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div id="month_revenue" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>

                        <div id="daily_revenue" class="apex-charts" dir="ltr"></div>
                    @else
                        <h5 class="text-center">
                            {{ __('report::labels.no_result') }}
                        </h5>
                    @endif
                </div>
            </div><!--end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">{{ __('report::labels.month_request') }} {{ $currentTime->month }}
                        /{{ $currentTime->year }}</h2>

                    @if($monthRequest)
                        <div class="row mb-4">
                            <div class="col-lg-6 align-middle">
                                <table class="table table-responsive">
                                    <tr>
                                        <td>{{ __('report::labels.total_request') }}</td>
                                        <td>{{ $monthRequest->total_request }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.offer_request') }}</td>
                                        <td>{{ $monthRequest->offer_request }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('report::labels.service_request') }}</td>
                                        <td>{{ $monthRequest->service_request }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div id="month_request" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>

                        <div id="daily_request" class="apex-charts" dir="ltr"></div>
                    @else
                        <h5 class="text-center">
                            {{ __('report::labels.no_result') }}
                        </h5>
                    @endif
                </div>
            </div><!--end card-->
        </div>
    </div>
    <!-- end row -->

@endsection

@section('script')
    <!-- apexcharts -->
    <script src="{{ theme_url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    @if($monthRevenue)
        @include('report::chart_monthly_revenue')
        @include('report::chart_daily_revenue')
    @endif

    @if($monthRequest)
        @include('report::chart_monthly_request')
        @include('report::chart_daily_request')
    @endif
@endsection
