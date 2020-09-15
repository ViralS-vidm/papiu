@extends('layouts.admin.master')

@section('title') {{ __('core::labels.create') . ' ' . __('service::labels.offer') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('service::labels.offer') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('core::labels.create') . ' ' . __('service::labels.offer') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('core::labels.create_new') . ' ' . __('service::labels.offer') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::open(['route' => 'offers.store','method'=>'POST', 'class' => 'outer-repeater', 'enctype' => 'multipart/form-data']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('service::offers._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('core::labels.create') . ' ' . __('service::labels.offer') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
