<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{ localize_field('name') }} @endslot
        @slot('label') {{ __('core::labels.name') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('core::labels.name') . '...' }} @endslot
    @endcomponent
</div>
