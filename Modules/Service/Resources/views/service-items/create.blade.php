@extends('layouts.admin.master')

@section('title') {{ __('core::labels.create') . ' ' . __('service::labels.service') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('service::labels.service') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('core::labels.create') . ' ' . __('service::labels.service') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('core::labels.create_new') . ' ' . __('service::labels.service') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::open(['route' => 'service-items.store','method'=>'POST', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('service::service-items._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('core::labels.create') . ' ' . __('service::labels.service') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
