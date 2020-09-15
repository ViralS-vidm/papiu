<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{localize_field('name')}} @endslot
        @slot('label') {{ __('core::labels.name') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('core::labels.name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('description')}} @endslot
        @slot('label') {{ __('service::labels.description') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('service::labels.description') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor', [
    'oldValue' => $offer->content
    ])
        @slot('field') {{ localize_field('content') }} @endslot
        @slot('label') {{ __('service::labels.content') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.value') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['home_image']
    ])
        @slot('field') home_image @endslot
        @slot('label') {{ __('image::labels.home_image') }} @endslot
    @endcomponent
</div>
