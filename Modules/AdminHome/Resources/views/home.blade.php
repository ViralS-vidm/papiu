@extends('layouts.admin.master')

@section('title') {{ __('core::labels.home') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('core::labels.home') }}  @endslot
        @slot('li_1') {{ __('core::labels.home') }}  @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div id="booking_count" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                @component('common-components.index-widget')
                    @slot('title') {{ __('report::labels.room_revenue') }}  @endslot
                    @slot('price') {{ format_currency($report->room_revenue) . get_currency() }}  @endslot
                    @slot('icon') bx bx-dollar font-size-24  @endslot
                @endcomponent

                @component('common-components.index-widget')
                    @slot('title') {{ __('report::labels.service_revenue') }}  @endslot
                    @slot('price') {{ format_currency($report->service_revenue) . get_currency() }}  @endslot
                    @slot('icon') bx bx-dollar font-size-24  @endslot
                @endcomponent

                @component('common-components.index-widget')
                    @slot('title') {{ __('report::labels.total_revenue') }}  @endslot
                    @slot('price') {{ format_currency($report->total_revenue) . get_currency() }}  @endslot
                    @slot('icon') bx bx-dollar font-size-24  @endslot
                @endcomponent
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">{{ __('report::labels.last_5_transactions') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{ __('booking::labels.short_code') }}</th>
                                        <th>{{ __('booking::labels.room') }}</th>
                                        <th>{{ __('service::labels.service') }}</th>
                                        <th>{{ __('booking::labels.total_price') }}</th>
                                        <th>{{ __('core::labels.contact') }}</th>
                                        <th>{{ __('booking::labels.status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target=".bs-example-modal-center-{{ $booking->id }}">
                                                    {{ $booking->short_code }}
                                                </a>
                                                <div class="modal fade bs-example-modal-center-{{ $booking->id }}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">{{ __('core::labels.detail') }} {{ $booking->short_code }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>{{ __('booking::labels.time_start') }}
                                                                    : {{ format_date($booking->time_start) }}</div>
                                                                <div>{{ __('booking::labels.time_end') }}
                                                                    : {{ format_date($booking->time_end) }}</div>
                                                                <div>{{ __('booking::labels.num_client') }}
                                                                    : {{ $booking->num_client }}</div>
                                                                <div>{{ __('booking::labels.checked_in_at') }}
                                                                    : {{ $booking->checked_in_at ? format_date_time($booking->checked_in_at) : "" }}</div>
                                                                <div>{{ __('booking::labels.checked_out_at') }}
                                                                    : {{ $booking->checked_out_at ? format_date_time($booking->checked_out_at) : "" }}</div>
                                                                <div>{{ __('booking::labels.completed_at') }}
                                                                    : {{ $booking->completed_at ? format_date_time($booking->completed_at) : "" }}</div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </td>
                                            <td>{{ $booking->product->name }}</td>
                                            <td>
                                                @foreach($booking->services as $service)
                                                    <div>
                                                        <label class="badge badge-primary">{{ $service->name }}</label>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>{{ format_currency($booking->total_price) }}</td>
                                            <td>
                                                <div>
                                                    <label
                                                        class="badge badge-success">{{ $booking->contact_name }}</label>
                                                </div>
                                                <div>
                                                    <label
                                                        class="badge badge-success">{{ $booking->contact_email }}</label>
                                                </div>
                                                <div>
                                                    <label
                                                        class="badge badge-success">{{ $booking->contact_number }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $booking->statusName }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- apexcharts -->
    <script src="{{ theme_url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    @include('report::chart_booking_count')
@endsection
