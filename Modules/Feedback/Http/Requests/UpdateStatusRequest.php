<?php

namespace Modules\Feedback\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Feedback\Entities\Feedback;

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
            'id' => 'required|exists:feedbacks,id',
            'status' => 'required|in:' . implode(',', [Feedback::STATUS_REPLIED])
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
