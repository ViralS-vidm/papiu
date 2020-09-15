<?php

namespace Modules\Agency\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Agency\Entities\Agency;

class UpdateStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:agencies,id',
            'status' => 'required|in:' . implode(',', [Agency::STATUS_VERIFIED])
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
