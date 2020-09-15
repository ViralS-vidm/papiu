<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{localize_field('name')}} @endslot
        @slot('label') {{ __('core::labels.name') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('core::labels.name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('home_intro')}} @endslot
        @slot('label') {{ __('product::labels.home_intro') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.home_intro') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('cate_intro')}} @endslot
        @slot('label') {{ __('product::labels.cate_intro') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.cate_intro') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('detail_overview')}} @endslot
        @slot('label') {{ __('product::labels.detail_overview') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.detail_overview') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('detail_brief')}} @endslot
        @slot('label') {{ __('product::labels.detail_brief') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.detail_brief') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('order_title')}} @endslot
        @slot('label') {{ __('product::labels.order_title') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.order_title') . '...' }} @endslot
    @endcomponent


    @component('common-components.forms.select', [
    'options' => $conveniences,
    'props' => ['multiple' => 'multiple', 'class' => 'select2'],
    'oldValue' => $oldValue['conveniences']
    ])
        @slot('field') conveniences[] @endslot
        @slot('label') {{ __('product::labels.convenience') }} @endslot
    @endcomponent

    @component('common-components.forms.number')
        @slot('field') price_per_day @endslot
        @slot('label') {{ __('product::labels.price_per_day') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.price_per_day') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent

    @component('common-components.forms.number')
        @slot('field') num_bedroom @endslot
        @slot('label') {{ __('product::labels.num_bedroom') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.num_bedroom') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent


    @component('common-components.forms.number')
        @slot('field') num_bathroom @endslot
        @slot('label') {{ __('product::labels.num_bathroom') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.num_bathroom') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent


    @component('common-components.forms.number')
        @slot('field') num_lounge @endslot
        @slot('label') {{ __('product::labels.num_lounge') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('product::labels.num_lounge') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['home_image']
    ])
        @slot('field') home_image @endslot
        @slot('label') {{ __('image::labels.home_image') }} @endslot
    @endcomponent

    @component('common-components.forms.image',[
    'thumbnails' => $thumbnails,
    'oldValue' => $oldValue['detail_image'],
    'multiple' => 'multiple'
    ])
        @slot('field') detail_image @endslot
        @slot('label') {{ __('image::labels.detail_image') }} @endslot
    @endcomponent
</div>
