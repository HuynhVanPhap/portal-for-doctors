<?php

namespace App\Http\Requests;

use App\Rules\Extension;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            'phone' => ['bail', 'required', 'regex:/^(0)\d+$/', 'min:10', 'max:14'],
            'speciality' => ['bail', 'required', Rule::in(array_values(config('constraint.speciality')))],
            'room_id' => ['bail', 'required', 'numeric'],
            'image' => [
                'bail',
                'image',
                'mimes:jpeg,png',
                'mimetypes:image/jpeg,image/png',
                new Extension(['jpeg', 'png']),
                'max:2048'
            ]
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Tên bác sĩ không được bỏ trống',
            'name.regex' => 'Tên bác sĩ không đúng định dạng',
            'name.min' => 'Tên bác sĩ không được ít hơn 5 kí tự',
            'name.max' => 'Tên bác sĩ không được quá 60 kí tự',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.min' => 'Số điện thoại ít hơn 10 số',
            'phone.max' => 'Số điện thoại lớn hơn 14 số',
            'speciality.required' => 'Vui lòng chọn chuyên ngành',
            'speciality.in' => 'Chuyên ngành không tồn tại',
            'room_id.required' => 'Vui lòng chọn phòng',
            'room_id.numeric' => 'Phòng phải là chữ số',
            'image.image' => 'Ảnh tải lên không phù hợp',
            'image.mimes' => 'Ảnh tải lên không phù hợp',
            'image.mimetypes' => 'Ảnh tải lên không phù hợp',
            'image.max' => 'Ảnh vượt quá dung lượng cho phép'
        ];

        return $messages;
    }
}
