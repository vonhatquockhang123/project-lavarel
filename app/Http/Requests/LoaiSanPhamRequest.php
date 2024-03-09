<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiSanPhamRequest extends FormRequest
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
            'ten'=>'required|min:5|max:50|regex:/^[^\d\W_][^\W_]*$/u',
        ];
    }
    public function messages(){
        return[
            'ten.required'=>'Tên loại sản phẩm không được bỏ trống!',
            'ten.min'=>'Tên loại sản phẩm phải lớn hơn :min ký tự!',
            'ten.max'=>'Tên loại sản phẩm phải nhỏ hơn :max ký tự!',
            'ten.regex'=>'Tên loại sản phẩm không được bắt đầu bằng số và không có ký tự đặc biệt!',
        ];
    }
}
