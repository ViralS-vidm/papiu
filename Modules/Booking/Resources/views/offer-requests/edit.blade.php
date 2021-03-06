@extends('layouts.admin.master')

@section('title') {{ __('core::labels.edit') . ' ' . __('booking::labels.offer_request') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('booking::labels.offer_request') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('core::labels.edit') . ' ' . __('booking::labels.offer_request') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('core::labels.edit') . ' ' . __('booking::labels.offer_request') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model($offerRequest, ['route' => ['offer-requests.update', $offerRequest->id],'method'=>'PATCH', 'class' => 'outer-repeater']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('booking::offer-requests._form', ['action' => 'edit'])
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ __('core::labels.update') . ' ' . __('booking::labels.offer_request') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
