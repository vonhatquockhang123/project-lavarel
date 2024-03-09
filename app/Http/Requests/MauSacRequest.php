<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MauSacRequest extends FormRequest
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
            'mau_sac'=>'required|min:2|max:10|regex:/^[^\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/u|unique:mau_sac,ten',
        ];
    }
    public function messages(){
        return[
                'mau_sac.required'=>"Màu sắc không được bỏ trống!",
                'mau_sac.min'=>"Màu sắc phải lớn hơn :min ký tự!",
                'mau_sac.max'=>'Màu sắc phải nhỏ hơn :max ký tự!',
                'mau_sac.regex'=>'Màu sắc không chứa ký tự đặc biệt và số!',
                'mau_sac.unique'=>'Màu sắc đã tồn tại!',
        ];
    }
}
