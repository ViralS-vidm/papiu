<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            localize_field('name')              => 'required',
            'price'                             => 'nullable|numeric|gte:0',
            localize_field('description')       => '',
            localize_field('price_description') => '',
            'serviceItems'                      => '',
            localize_field('detail')            => '',
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
