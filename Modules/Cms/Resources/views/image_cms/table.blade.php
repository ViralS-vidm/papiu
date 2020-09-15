<table class="table table-centered">
    <thead class="thead-light">
    <tr>
        <th>{{ __('cms::labels.area') }}</th>
        <th>{{ __('cms::labels.alt') }}</th>
        <th>{{ __('cms::labels.title') }}</th>
        <th>{{ __('cms::labels.name') }}</th>
        <th>{{ __('cms::labels.description') }}</th>
        @if($type == \Modules\Cms\Entities\ConfigCms::TYPE_HOME_CMS)
            <th>{{ __('cms::labels.hash_tag') }}</th>
        @endif
        <th>{{ __('cms::labels.image') }}</th>
        <th>{{ __('core::labels.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($imageCms as $cms)
        <tr>
            <td>{{ @\Modules\Cms\Entities\ImageCms::getAreaImage()[$cms->key] }}</td>
            <td>{{ $cms->alt }}</td>
            <td>{!! $cms->title !!}</td>
            <td>{!! $cms->name !!}</td>
            <td>{!! $cms->description !!}</td>
            @if($type == \Modules\Cms\Entities\ConfigCms::TYPE_HOME_CMS)
                <td>{!! $cms->hash_tag !!}</td>
            @endif
            <td><img width="100" src="{{ asset(@$cms->imageCms->first()->original_url) }}" alt="">
            </td>
            <td>
                <a href="{{ route('image-cms.edit', [$cms->id]) }}"
                   class="mr-3 text-primary" data-toggle="tooltip"
                   data-placement="top" title=""
                   data-original-title="{{ __('core::labels.edit') }}"><i
                        class="mdi mdi-pencil font-size-18"></i></a>
                {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['image-cms.destroy', $cms->id],
                        'style'=>'display:inline',
                        'onsubmit' => 'return confirm("' . __('core::labels.delete_confirm') . '");'
                ]) !!}
                <span data-toggle="tooltip"
                      data-placement="top" title=""
                      data-original-title="{{ __('core::labels.delete') }}">
                                            <button type="submit"
                                                    style="background: transparent; border: transparent; padding: 0;">
                                                <i class="mdi mdi-close font-size-18 text-danger"></i>
                                            </button>
                                        </span>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
