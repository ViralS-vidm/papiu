<div data-repeater-item class="outer">

    @component('common-components.forms.select', [
    'options' => $offers,
    'props' => ['class' => 'select2']
    ])
        @slot('field') offer_id @endslot
        @slot('label') {{ __('service::labels.offer') }} @endslot
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

</div>
