<div data-repeater-item class="outer">
    @if ($action == 'create')
        @component('common-components.forms.select', [
          'options' => $bookings,
          'props' => ['class' => 'select2'],
          'oldValue' => []
          ])
            @slot('field') booking_id @endslot
            @slot('label') {{ __('booking::labels.short_code') . ' ' . __('booking::labels.booking') }} @endslot
        @endcomponent
    @endif
    @component('common-components.forms.number')
        @slot('field') price @endslot
        @slot('label') {{ __('payment::labels.price') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('payment::labels.price') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') comment @endslot
        @slot('label') {{ __('payment::labels.comment') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('payment::labels.comment') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select', [
       'options' => $status,
       'props' => ['class' => 'select2'],
       'oldValue' => $oldValue['status']
       ])
        @slot('field') status @endslot
        @slot('label') {{ __('payment::labels.status') }} @endslot
    @endcomponent

</div>
