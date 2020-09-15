@extends('layouts.admin.master')

@section('title') {{ __('booking::labels.booking') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
    <style>
        .action-status {
            margin-right: 10px;
            float: left
        }
    </style>
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('booking::labels.booking') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('booking::labels.booking') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('bookings.index') }}">
                        <h4 class="card-title mb-4">{{ __('booking::labels.filter') }}</h4>

                        <div class="search-box mr-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text"
                                       class="form-control"
                                       id="search-box"
                                       name="filter[search]"
                                       placeholder="{{ __('core::labels.search') }}..."
                                       @if ($search = request()->get('filter')['search'])
                                       value="{{ $search  }}"
                                        @endif
                                />
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>

                        <div class="mt-2 pt-3">
                            <h5 class="font-size-14 mb-3">{{ __('booking::labels.time_start') }}</h5>
                            @component('common-components.forms.date-time-picker-field')
                                @slot('field') from @endslot
                                @slot('label') {{ __('booking::labels.from') }} @endslot
                                @slot('placeholder') {{ __('booking::labels.from') }} @endslot
                            @endcomponent
                            <div class="mt-1">
                                @component('common-components.forms.date-time-picker-field')
                                    @slot('field') to @endslot
                                    @slot('label') {{ __('booking::labels.to') }} @endslot
                                    @slot('placeholder') {{ __('booking::labels.to') }} @endslot
                                @endcomponent
                            </div>

                            <div class="mt-2 pt-3">
                                <h5 class="font-size-14 mb-3">{{ __('booking::labels.status') }}</h5>
                                <div>
                                    <select name="filter[status]" id="filter[status]">
                                        @foreach(\Modules\Booking\Entities\Booking::statusNameForFilter() as $key=>$option)
                                            <option value="{{ $key }}" @if(request()->get('filter')['status'] == $key)
                                                '\" selected \"' @endif>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 text-right">
                                <div>
                                    <button class="btn btn-primary" type="submit"
                                            onclick="return filter('{{ route('bookings.index', request()->getQueryString()) }}')">
                                        {{ __('booking::labels.filter') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a type="button" style="color: white;" href="{{ route('bookings.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-plus mr-1"></i> {{ __('core::labels.add_new') . ' ' . __('booking::labels.booking') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('booking::labels.short_code') }}</th>
                                <th>{{ __('booking::labels.room') }}</th>
                                <th>{{ __('service::labels.service') }}</th>
                                <th>{{ __('booking::labels.total_price') }}</th>
                                <th>{{ __('booking::labels.paid') }}</th>
                                <th>{{ __('booking::labels.remain') }}</th>
                                <th>{{ __('core::labels.contact') }}</th>
                                <th>{{ __('booking::labels.status') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
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
                                    <td>{{ format_currency($booking->paid) }}</td>
                                    <td>
                                        @if ($booking->remain > 0)
                                            <a href="{{ route('payments.create', ['booking' => $booking->short_code, 'amount' => $booking->remain]) }}">
                                                {{ format_currency($booking->remain) }}
                                            </a>
                                        @else
                                            {{ format_currency($booking->remain) }}
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <label class="badge badge-success">{{ $booking->contact_name }}</label>
                                        </div>
                                        <div>
                                            <label class="badge badge-success">{{ $booking->contact_email }}</label>
                                        </div>
                                        <div>
                                            <label class="badge badge-success">{{ $booking->contact_number }}</label>
                                        </div>
                                    </td>
                                    <td>{{ $booking->statusName }}</td>
                                    <td>
                                        <div class="action-status">
                                            @if($booking->status == \Modules\Booking\Entities\Booking::STATUS_NEW)
                                                <button type="button" class="btn btn-primary btn-sm btn-update-status"
                                                        booking-id="{{ $booking->id }}"
                                                        status="{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_IN }}">
                                                    {{ __('booking::labels.actions.check_in') }}
                                                </button>
                                            @endif
                                            @if($booking->status == \Modules\Booking\Entities\Booking::STATUS_CHECKED_IN)

                                                <button type="button" class="btn btn-warning btn-update-status"
                                                        booking-id="{{ $booking->id }}"
                                                        status="{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_OUT }}">
                                                    {{ __('booking::labels.actions.check_out') }}
                                                </button>
                                            @endif
                                            @if($booking->status == \Modules\Booking\Entities\Booking::STATUS_CHECKED_OUT)
                                                <button type="button" class="btn btn-danger btn-update-status"
                                                        booking-id="{{ $booking->id }}"
                                                        status="{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_COMPLETED }}">
                                                    {{ __('booking::labels.actions.complete') }}
                                                </button>
                                            @endif
                                        </div>

                                        @if($booking->status !== \Modules\Booking\Entities\Booking::STATUS_CHECKED_COMPLETED)
                                            <a href="{{ route('bookings.edit', [$booking->id]) }}"
                                               class="mr-3 text-primary" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="{{ __('core::labels.edit') }}"><i
                                                        class="mdi mdi-pencil font-size-18"></i></a>

                                            {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['bookings.destroy', $booking->id],
                                                    'style'=>'display:inline',
                                                    'onsubmit' => 'return confirm("' . __('core::labels.delete_confirm') . '");'
                                            ]) !!}
                                            <span data-toggle="tooltip"
                                                  data-placement="top" title=""
                                                  data-original-title="{{ __('core::labels.delete') }}">
                                            <button type="submit"
                                                    style="background: transparent; border: transparent; padding: 0;">
                                                <i class="mdi mdi-close font-size-18 text-danger"></i>
                                            </button>
                                        </span>
                                            {!! Form::close() !!}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $bookings->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')

    @include('common-components.functions.search')
    @include('common-components.functions.filter')
    @include('common-components.functions.toastr')

    <script>
      $(function () {
        const CLASS_BUTTON_STATUS = {
          '{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_IN }}': 'btn btn-primary btn-update-status',
          '{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_OUT }}': 'btn btn-warning btn-update-status',
          '{{ \Modules\Booking\Entities\Booking::STATUS_CHECKED_COMPLETED }}': 'btn btn-danger btn-update-status',
        }
        $(document).on('click', '.btn-update-status', function () {
          if (confirm('{{ __('core::labels.confirm_action') }}')) {

            $.ajax({
              url: "{{ route('bookings.update-status') }}",
              type: 'post',
              dataType: 'json',
              data: {
                id: $(this).attr('booking-id'),
                status: $(this).attr('status'),
                _token: '{{ csrf_token() }}'
              },
              success: function (response) {
                location.reload()
              },
              error: function (jqXHR, textStatus, errorThrown) {
                toastr.error(jqXHR.responseJSON.message)
              }
            })
          }
        })
      })
    </script>

@endsection
