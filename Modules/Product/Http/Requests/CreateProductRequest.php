<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            localize_field('name')            => 'required',
            localize_field('home_intro')      => 'required',
            localize_field('cate_intro')      => 'required',
            localize_field('detail_overview') => 'required',
            localize_field('detail_brief')    => 'required',
            localize_field('order_title')     => 'required',
            'price_per_day'                   => 'required|numeric|gt:0',
            'conveniences'                    => 'required',
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

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'price_per_day' => __('product::labels.price_per_day'),
        ];
    }
}
