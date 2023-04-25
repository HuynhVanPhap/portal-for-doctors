<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'status' => ['bail', 'required', Rule::in(array_values(config('constraint.appointment_status')))],
        ];

        return $rules;
    }

    /**
     * Get the validation messages for each rule.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        $messages = [
            'status.required' => 'Trạng thái không được bỏ trống',
            'status.in' => 'Dữ liệu Trạng thái không tồn tại'
        ];

        return $messages;
    }
}
