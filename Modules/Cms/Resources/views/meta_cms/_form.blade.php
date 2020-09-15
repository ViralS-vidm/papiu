<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') key @endslot
        @slot('label') {{ __('cms::labels.key') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.key') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('title')}} @endslot
        @slot('label') {{ __('cms::labels.title') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.title') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('key_word')}} @endslot
        @slot('label') {{ __('cms::labels.key_word') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.key_word') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('tag')}} @endslot
        @slot('label') {{ __('cms::labels.tag') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.tag') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor')
        @slot('field') {{ localize_field('description')}} @endslot
        @slot('label') {{ __('cms::labels.description') }} @endslot
        @slot('oldValue') {{ $metaCms->description }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.description') . '...' }} @endslot
    @endcomponent
</div>
