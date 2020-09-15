@extends('layouts.admin.master')

@section('title') {{ __('feedback::labels.feedback') }} @endsection

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
        @slot('title') {{ __('feedback::labels.feedback') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('feedback::labels.feedback') }} @endslot
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
                                           onkeypress="return search(event, '{{ route('feedbacks.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('feedbacks.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('core::labels.name') }}</th>
                                <th>{{ __('core::labels.email') }}</th>
                                <th>{{ __('core::labels.phone') }}</th>
                                <th>{{ __('core::labels.dob') }}</th>
                                <th>{{ __('feedback::labels.content') }}</th>
                                <th>{{ __('feedback::labels.status') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->name }}</td>
                                    <td>{{ $feedback->email }}</td>
                                    <td>{{ $feedback->phone }}</td>
                                    <td>{{ $feedback->dob }}</td>
                                    <td>{{ $feedback->content }}</td>
                                    <td>{{ \Modules\Feedback\Entities\Feedback::statusName()[$feedback->status] }}</td>
                                    <td>
                                        <div class="action-status">
                                            @if($feedback->status == \Modules\Feedback\Entities\Feedback::STATUS_NEW)
                                                <button type="button" class="btn btn-primary btn-sm btn-update-status"
                                                        feedback-id="{{ $feedback->id }}"
                                                        status="{{ \Modules\Feedback\Entities\Feedback::STATUS_REPLIED }}">
                                                    {{ __('feedback::labels.actions.reply_done') }}
                                                </button>
                                            @endif
                                        </div>

                                        {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['feedbacks.destroy', $feedback->id],
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $feedbacks->withQueryString()->links() }}
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
        $(document).on('click', '.btn-update-status', function () {
          if (confirm('{{ __('core::labels.confirm_action') }}')) {

            $.ajax({
              url: "{{ route('feedbacks.update-status') }}",
              type: 'post',
              dataType: 'json',
              data: {
                id: $(this).attr('feedback-id'),
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
