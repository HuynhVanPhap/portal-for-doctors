<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'name' => ['bail', 'required', 'regex:/^([a-zA-Z]\s?)+$/', 'min:5', 'max:60'],
            'email' => ['bail', 'required', 'email:rfc,dns', 'unique:appointments,email'],
            'date' => ['bail', 'required', 'date', 'date_format:Y-m-d'],
            'phone' => ['bail', 'required', 'regex:/^(0)\d+$/', 'min:10', 'max:14'],
            'doctor_id' => ['bail', 'required', 'numeric', 'exists:App\Models\Doctor,id'],
            'message' => ['bail'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Tên bệnh nhân không được để trống',
            'name.regex' => 'Dữ liệu nhập không đúng định dạng cho phép',
            'name.min' => 'Tên bệnh nhân không được ít hơn 5 kí tự',
            'name.max' => 'Tên bệnh nhân không được quá 60 kí tự',
            'email.required' => 'Email liên lạc không được bỏ trống',
            'email.email' => 'Định dạng Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'date.required' => 'Ngày khám bệnh không được để trống',
            'date.date' => 'Định dạng ngày tháng không đúng',
            'date.date_format' => 'Định dạng ngày tháng không đúng',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.regex' => 'Số điện thoại nhập không đúng định dạng',
            'phone.min' => 'Số điện thoại ít hơn 10 số',
            'phone.max' => 'Số điện thoại lớn hơn 14 số',
            'doctor_id.required' => 'Vui lòng chọn bác sĩ - chuyên ngành',
            'doctor_id.numeric' => 'Dữ liệu gửi lên không phù hợp',
            'doctor_id.exists' => 'Dữ liệu nhập không tồn tại'
        ];

        return $messages;
    }
}
