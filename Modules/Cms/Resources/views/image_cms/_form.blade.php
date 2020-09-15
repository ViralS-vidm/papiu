<div data-repeater-item class="outer">
    @component('common-components.forms.select', [
    'options' => $optionArea,
    'props' => ['class'=> 'form-control'],
    'oldValue' => $oldValue['key']
    ])
        @slot('field') key @endslot
        @slot('label') {{ __('cms::labels.area') }} @endslot
        @slot('properties') [] @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('alt')}} @endslot
        @slot('label') {{ __('cms::labels.alt') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.alt') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('title')}} @endslot
        @slot('label') {{ __('cms::labels.title') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.title') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('name')}} @endslot
        @slot('label') {{ __('cms::labels.name') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('hash_tag')}} @endslot
        @slot('label') {{ __('cms::labels.hash_tag') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.hash_tag') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('key_word')}} @endslot
        @slot('label') {{ __('cms::labels.key_word') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.key_word') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{ localize_field('header')}} @endslot
        @slot('label') {{ __('cms::labels.header') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.header') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor')
        @slot('field') {{ localize_field('description')}} @endslot
        @slot('label') {{ __('cms::labels.description') }} @endslot
        @slot('oldValue') {{ $oldValue['description'] }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.description') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['home_image']
    ])
        @slot('field') image @endslot
        @slot('label') {{ __('cms::labels.image') }} @endslot
    @endcomponent
</div>
