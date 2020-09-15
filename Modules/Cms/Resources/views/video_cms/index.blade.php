@extends('layouts.admin.master')

@section('title') {{ __('cms::labels.video') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('cms::labels.video') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('cms::labels.video') }} @endslot
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
                                           onkeypress="return search(event, '{{ route('video-cms.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('video-cms.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('cms::labels.area') }}</th>
                                <th>{{ __('cms::labels.title') }}</th>
                                <th>{{ __('cms::labels.source') }}</th>
                                <th>{{ __('cms::labels.description') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videoCms as $cms)
                                <tr>
                                    <td>{{ @\Modules\Cms\Entities\VideoCms::getAreaVideo()[$cms->key] }}</td>
                                    <td>{{ $cms->title }}</td>
                                    <td>{!! $cms->source !!}</td>
                                    <td>{!! $cms->description !!}</td>
                                    </td>
                                    <td>
                                        <a href="{{ route('video-cms.edit', [$cms->id]) }}"
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
