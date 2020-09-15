@extends('layouts.admin.master')

@section('title') {{ __('booking::labels.offer_request') }} @endsection

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
        @slot('title') {{ __('booking::labels.offer_request') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('booking::labels.offer_request') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text"
                                           class="form-control"
                                           id="search-box"
                                           placeholder="{{ __('core::labels.search') }}..."
                                           @if ($search = request()->get('filter')['search'])
                                           value="{{ $search  }}"
                                           @endif
                                           onkeypress="return search(event, '{{ route('offer-requests.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('offer-requests.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a type="button" style="color: white;" href="{{ route('offer-requests.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i> {{ __('core::labels.add_new') . ' ' . __('booking::labels.offer_request') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('service::labels.offer') }}</th>
                                <th>{{ __('core::labels.contact') }}</th>
                                <th>{{ __('booking::labels.status') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offerRequests as $offerRequest)
                                <tr>
                                    <td>
                                        {{ $offerRequest->offer->name }}
                                    </td>
                                    <td>
                                        <label class="badge badge-success">{{ $offerRequest->contact_name }}</label>
                                        <label class="badge badge-success">{{ $offerRequest->contact_email }}</label>
                                        <label class="badge badge-success">{{ $offerRequest->contact_number }}</label>
                                    </td>
                                    <td>{{ $offerRequest->statusName }}</td>
                                    <td>
                                        @if(! $offerRequest->is_completed)

                                            {!! Form::open([
                                                    'method' => 'PATCH',
                                                    'route' => ['offer-requests.complete', $offerRequest->id],
                                                    'style'=>'display:inline',
                                                    'onsubmit' => 'return confirm("' . __('core::labels.confirm_action') . '");'
                                            ]) !!}
                                            <span data-toggle="tooltip"
                                                  data-placement="top" title=""
                                                  data-original-title="{{ __('core::labels.complete') }}">
                                            <button type="submit"
                                                    style="background: transparent; border: transparent; padding: 0;">
                                                <i class="mdi mdi-check-circle font-size-18 text-success mr-3"></i>
                                            </button>
                                            </span>
                                            {!! Form::close() !!}

                                            <a href="{{ route('offer-requests.edit', [$offerRequest->id]) }}"
                                               class="mr-3 text-primary" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="{{ __('core::labels.edit') }}"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>

                                            {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['offer-requests.destroy', $offerRequest->id],
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
                        {{ $offerRequests->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')

    @include('common-components.functions.search')
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
