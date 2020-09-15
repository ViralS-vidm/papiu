@extends('layouts.admin.master')

@section('title') {{ __('cms::labels.config') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('cms::labels.config') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('cms::labels.config') }} @endslot
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
                                           onkeypress="return search(event, '{{ route('config-cms.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('config-cms.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(\Modules\Cms\Entities\ConfigCms::getTypeSelect() as $key => $type)
                                    <li class="nav-item">
                                        <a @if($key == Modules\Cms\Entities\ConfigCms::TYPE_SERVICE_CMS) class="nav-link active"
                                           @else class="nav-link" @endif data-toggle="tab" href="#configCmsType{{ $key }}" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">{{ $type }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                @foreach(\Modules\Cms\Entities\ConfigCms::getTypeSelect() as $key => $type)
                                    <div @if($key == Modules\Cms\Entities\ConfigCms::TYPE_SERVICE_CMS) class="tab-pane active"
                                         @else class="tab-pane" @endif id="configCmsType{{ $key }}" role="tabpanel">
                                        @include('cms::config_cms.table', ['configCms' => $configCms->where('type', $key), 'type' => $key])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

{{--                    <div class="pagination pagination-rounded justify-content-end mb-2">--}}
{{--                        {{ $configCms->withQueryString()->links() }}--}}
{{--                    </div>--}}
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
