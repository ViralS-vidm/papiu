<?php

namespace Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoCmsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            localize_field('title') => 'required|string|min:2|max:255',
            localize_field('name') => 'required|string|min:2|max:255',
            localize_field('description') => 'required',
            'source' => 'required|string|min:2|max:255'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
