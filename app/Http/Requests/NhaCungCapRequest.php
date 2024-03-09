<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
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
        $id = $this->route('id');
        return [
           'ten' => 'required|min:10|max:128|regex:/^[^\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/u|unique:nha_cung_cap,ten,'. $id,
           'dien_thoai'=>'required|regex:/^0\d{9}$/',
           'dia_chi' => 'required|min:10|max:128|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/-]+$/u',

        ];
    }
    public function messages(){
        return[
            'ten.required'=>"Tên nhà cung cấp không được bỏ trống!",
            'ten.min'=>'Tên nhà cung cấp phải lớn hơn :min ký tự!',
            'ten.max'=>'Tên nhà cung cấp nhỏ hơn :max ký tự!',
            'ten.regex'=>"Tên nhà cung cấp không được chứa ký tự đặc biệt và số!",
            'ten.unique'=>'Nhà cung cấp đã tồn tại!',

            'dien_thoai.required'=>"Số điện thoại nhà cung cấp không được bỏ trống!",
            'dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',

            'dia_chi.required'=>"Địa chỉ nhà cung cấp không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ nhà cung cấp phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ nhà cung cấp phải nhỏ hơn :max ký tự!",
            'dia_chi.regex'=>"Địa chỉ nhà cung cấp không chứa ký tự đặc biệt!",
        ];
    }
}
