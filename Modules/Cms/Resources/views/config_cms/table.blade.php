<table class="table table-centered">
    <thead class="thead-light">
    <tr>
        <th>{{ __('cms::labels.area') }}</th>
        <th>{{ __('cms::labels.title') }}</th>
        <th>{{ __('cms::labels.value') }}</th>
        @if($type == \Modules\Cms\Entities\ConfigCms::TYPE_MAIL_CMS)
            <th>{{ __('cms::labels.status') }}</th>
        @endif
        <th>{{ __('core::labels.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($configCms as $cms)
        <tr>
            <td>{{ @\Modules\Cms\Entities\ConfigCms::getAreaConfig()[$cms->key] }}</td>
            <td>{{ $cms->title }}</td>
            <td>{!! $cms->value !!}</td>
            @if($type == \Modules\Cms\Entities\ConfigCms::TYPE_MAIL_CMS)
                <th>{{ \Modules\Cms\Entities\ConfigCms::getSelectedStatus()[$cms->status] }}</th>
            @endif
            <td>
                <a href="{{ route('config-cms.edit', [$cms->id]) }}"
                   class="mr-3 text-primary" data-toggle="tooltip"
                   data-placement="top" title=""
                   data-original-title="{{ __('core::labels.edit') }}"><i
                        class="mdi mdi-pencil font-size-18"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

