<div data-repeater-item class="outer">
    @component('common-components.forms.date-time-picker', [
    'oldValue' => $oldValue['time_start']
    ])
        @slot('field') time_start @endslot
        @slot('label') {{ __('booking::labels.time_start') }} @endslot
    @endcomponent

    @component('common-components.forms.date-time-picker', [
    'oldValue' => $oldValue['time_end']
    ])
        @slot('field') time_end @endslot
        @slot('label') {{ __('booking::labels.time_end') }} @endslot
    @endcomponent

    @component('common-components.forms.select', [
    'options' => $products,
    'props' => ['class' => 'select2'],
    'oldValue' => $oldValue['product_id']
    ])
        @slot('field') product_id @endslot
        @slot('label') {{ __('booking::labels.room') }} @endslot
    @endcomponent

    @component('common-components.forms.select', [
    'options' => $services,
    'props' => ['multiple' => 'multiple', 'class' => 'select2'],
    'oldValue' => $oldValue['services']
    ])
        @slot('field') services[] @endslot
        @slot('label') {{ __('service::labels.service') }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') contact_name @endslot
        @slot('label') {{ __('booking::labels.contact_name') }} @endslot
        @slot('placeholder') {{ __('booking::labels.contact_name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') contact_email @endslot
        @slot('label') {{ __('booking::labels.contact_email') }} @endslot
        @slot('placeholder') {{ __('booking::labels.contact_email') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') contact_number @endslot
        @slot('label') {{ __('booking::labels.contact_number') }} @endslot
        @slot('placeholder') {{ __('booking::labels.contact_number') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') address @endslot
        @slot('label') {{ __('booking::labels.address') }} @endslot
        @slot('placeholder') {{ __('booking::labels.address') . '...' }} @endslot
    @endcomponent

    @if($action == 'create')
        @component('common-components.forms.select', [
        'options' => $status,
        'props' => ['class' => 'select2'],
        'oldValue' => $oldValue['status']
        ])
            @slot('field') status @endslot
            @slot('label') {{ __('booking::labels.status') }} @endslot
        @endcomponent
    @endif

</div>
