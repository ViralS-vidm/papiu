@extends('layouts.admin.master')

@section('title') {{ __('core::labels.edit') . ' ' . __('cms::labels.config') }} @endsection

@section('css')
    <!-- Bootstrap Rating css -->
    <link rel="stylesheet" type="text/css"
          href="{{ theme_url('assets/libs/bootstrap-rating/bootstrap-rating.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('cms::labels.config') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('core::labels.edit') . ' ' . __('cms::labels.config') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('core::labels.edit') . ' ' . __('cms::labels.config') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model($configCms, ['route' => ['config-cms.update', $configCms->id],'method'=>'PATCH', 'class' => 'outer-repeater', 'enctype' => 'multipart/form-data']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('cms::config_cms._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('core::labels.update') . ' ' . __('cms::labels.config') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('script-bottom')
@endsection
