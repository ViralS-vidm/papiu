@extends('layouts.admin.master')

@section('title') {{ __('product::labels.product') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ __('product::labels.product') }} @endslot
        @slot('li_1') {{ __('core::labels.home') }} @endslot
        @slot('li_2') {{ __('product::labels.product') }} @endslot
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
                                           onkeypress="return search(event, '{{ route('products.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('products.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a type="button" style="color: white;" href="{{ route('products.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i> {{ __('core::labels.add_new') . ' ' . __('product::labels.product') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ __('core::labels.name') }}</th>
                                <th>{{ __('product::labels.convenience') }}</th>
                                <th>{{ __('product::labels.price_per_day') }}</th>
                                <th>{{ __('product::labels.num_bedroom') }}</th>
                                <th>{{ __('product::labels.num_bathroom') }}</th>
                                <th>{{ __('product::labels.num_lounge') }}</th>
                                <th>{{ __('core::labels.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @foreach($product->conveniences as $v)
                                            <div><label class="badge badge-success">{{ $v->name }}</label></div>
                                        @endforeach
                                    </td>
                                    <td>{{ format_currency($product->price_per_day) }}</td>
                                    <td>{{ $product->num_bedroom }}</td>
                                    <td>{{ $product->num_bathroom }}</td>
                                    <td>{{ $product->num_lounge }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', [$product->id]) }}"
                                           class="mr-3 text-primary" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ __('core::labels.edit') }}"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['products.destroy', $product->id],
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
                        {{ $products->withQueryString()->links() }}
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
