<div data-repeater-item class="outer">
    @component('common-components.forms.text', ['extra' => ['disabled' => 'disabled', 'readonly']])
        @slot('field') @endslot
        @slot('label') {{ __('cms::labels.area') }} @endslot
        @slot('placeholder') {{ \Modules\Cms\Entities\ConfigCms::getAreaConfig()[$oldValue['key']] }} @endslot
    @endcomponent
    @component('common-components.forms.text-area')
        @slot('field') {{ localize_field('title')}} @endslot
        @slot('label') {{ __('cms::labels.title') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.title') . '...' }} @endslot
    @endcomponent
    @if($oldValue['type'] == \Modules\Cms\Entities\ConfigCms::TYPE_MAIL_CMS)
        @component('common-components.forms.select', [
            'options' => $optionStatus,
            'props' => ['class'=> 'form-control'],
            'oldValue' => $oldValue['status']
            ])
            @slot('field') status @endslot
            @slot('label') {{ __('cms::labels.status') }} @endslot
            @slot('properties') [] @endslot
        @endcomponent
    @endif
    @component('common-components.forms.ck-editor')
        @slot('field') {{ localize_field('value')}} @endslot
        @slot('label') {{ __('cms::labels.value') }} @endslot
        @slot('oldValue') {{ $configCms->value }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.value') . '...' }} @endslot
    @endcomponent
</div>
