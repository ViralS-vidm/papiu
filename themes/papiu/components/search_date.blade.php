<div class="container">
    <form action="{{ route('frontpage.booking-list') }}" method="get">

        <div class="search" id="booking">
            <div class="dropdown days">
                <span>Chọn ngày lưu trú</span>
                <a class="btn btn-secondary dropdown-toggle" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    @component('common-components.forms.date-time-picker')
                        @slot('field') time_start @endslot
                        @slot('label') {{ __('booking::labels.time_start') }} @endslot  
                        @slot('placeholder') {{ __('booking::labels.time_start') }} @endslot 
                    @endcomponent
                </a>
            </div>
            <div class="dropdown days">
                <span>Chọn ngày lưu trú</span>
                <a class="btn btn-secondary dropdown-toggle" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    @component('common-components.forms.date-time-picker')
                        @slot('field') time_end @endslot
                        @slot('label') {{ __('booking::labels.time_end') }} @endslot
                        @slot('placeholder') {{ __('booking::labels.time_end') }} @endslot 
                    @endcomponent
                </a>
            </div>
            <button type="submit" class="btn-secondary find_room">{{ __('booking::labels.search_product') }}</button>
        </div><!-- End .search -->
    </form>
</div>