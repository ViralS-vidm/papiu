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

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('detail')}} @endslot
        @slot('label') {{ __('service::labels.detail') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('service::labels.detail') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') price @endslot
        @slot('label') {{ __('service::labels.price') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('service::labels.price') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{localize_field('price_description')}} @endslot
        @slot('label') {{ __('service::labels.price_description') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('service::labels.price_description') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select', [
    'options' => $serviceItems,
    'props' => ['multiple' => 'multiple', 'class' => 'select2'],
    'oldValue' => $oldValue['serviceItems']
    ])
        @slot('field') serviceItems[] @endslot
        @slot('label') {{ __('service::labels.service') }} @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['home_image']
    ])
        @slot('field') home_image @endslot
        @slot('label') {{ __('image::labels.home_image') }} @endslot
    @endcomponent
</div>
