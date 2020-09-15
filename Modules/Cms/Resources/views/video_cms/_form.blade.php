<div data-repeater-item class="outer">
    @component('common-components.forms.text', ['extra' => ['disabled' => 'disabled', 'readonly']])
        @slot('field')  @endslot
        @slot('label') {{ __('cms::labels.area') }} @endslot
        @slot('placeholder') {{ \Modules\Cms\Entities\VideoCms::getAreaVideo()[$oldValue['key']] }} @endslot
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
        @slot('field') source @endslot
        @slot('label') {{ __('cms::labels.source') }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.source') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor')
        @slot('field') {{ localize_field('description')}} @endslot
        @slot('label') {{ __('cms::labels.description') }} @endslot
        @slot('oldValue') {{ $oldValue['description'] }} @endslot
        @slot('placeholder') {{ __('core::labels.enter') . ' ' . __('cms::labels.description') . '...' }} @endslot
    @endcomponent
</div>
