<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') key @endslot
        @slot('label') {{ __('cms::labels.key') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.key') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor')
        @slot('field') value @endslot
        @slot('label') {{ __('cms::labels.value') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.value') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['home_image']
    ])
        @slot('field') image @endslot
        @slot('label') {{ __('cms::labels.image') }} @endslot
    @endcomponent
</div>
