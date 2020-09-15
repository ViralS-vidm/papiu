<?php

namespace Modules\Booking\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'time_start' => 'required|date|after:today',
            'time_end' => 'required|date|after:time_start',
            'product_id' => 'required|exists:products,id',
            'services' => 'nullable',
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required',
            'address' => 'nullable',
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
