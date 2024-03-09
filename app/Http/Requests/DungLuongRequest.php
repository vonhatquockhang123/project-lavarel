<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DungLuongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dung_luong'=>'required|min:1|max:100|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/-]+$/u|unique:dung_luong,ten',
        ];
    }
    public function messages(){
        return [
            'dung_luong.required'=>"Dung lượng không được bỏ trống!",
            'dung_luong.min'=>"Dung lượng phải lốn hơn :min ký tự!",
            'dung_luong.max'=>"Dung lượng phải nhỏ hơn :max ký tự!",
            'dung_luong.regex'=>"Dung lượng không chứa ký tự đặc biệt!",
            'dung_luong.unique'=>"Dung lượng đã tồn tại!",
        ];
    }
}
