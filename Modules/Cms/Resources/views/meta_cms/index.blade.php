@extends('layouts.admin.master')

@section('title') {{ __('cms::labels.meta') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('cms::labels.meta') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('cms::labels.meta') }} @endslot
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
                                           onkeypress="return search(event, '{{ route('meta-cms.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('meta-cms.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('cms::labels.page') }}</th>
                                <th>{{ __('cms::labels.title') }}</th>
                                <th>{{ __('cms::labels.key_word') }}</th>
                                <th>{{ __('cms::labels.tag') }}</th>
                                <th>{{ __('cms::labels.description') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($metaCms as $cms)
                                <tr>
                                    <td>{{ $cms->key }}</td>
                                    <td>{{ $cms->title }}</td>
                                    <td>{{ $cms->key_word }}</td>
                                    <td>{{ $cms->tag }}</td>
                                    <td style="max-width: 20%;">{!!  $cms->description !!}</td>
                                    <td>
                                        <a href="{{ route('meta-cms.edit', [$cms->id]) }}"
                                           class="mr-3 text-primary" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ __('core::labels.edit') }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $metaCms->withQueryString()->links() }}
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

@endsection
