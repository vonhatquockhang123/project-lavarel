<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
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
            'ho_ten' => 'required|min:10|max:50|regex:/^[^\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/u',

            'email' => [
                'required',
                'min:15',
                'max:50',
                'regex:/^[a-zA-Z0-9._-]+@gmail\.com$/',
                'unique:khach_hang,email,' . $id,
            ],

            'ten_dang_nhap'=>'required|min:6|max:32|regex:/^[a-zA-Z][a-zA-Z0-9]*$/u|not_regex:/[\p{P}\p{M}\p{S}\p{C}\p{Z}]/u|not_regex:/[^\p{L}\p{N}]/u|unique:khach_hang,ten_dang_nhap,' . $id,
            
            'mat_khau'=>'required|min:6|max:128',

            'dien_thoai' =>'required|regex:/^0\d{9}$/',

            'dia_chi' => 'required|min:10|max:128|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/-]+$/u',
        ];
    }
    public function messages(){
        return[
            'ho_ten.required'=>"Tên khách hàng không được bỏ trống!",
            'ho_ten.min'=>"Tên khách hàng phải lớn hơn :min ký tự",
            'ho_ten.max'=>"Tên khách hàng phải nhỏ hơn :max ký tự",
            'ho_ten.regex'=>"Tên khách hàng không được chứa ký tự là số!",
            
            'email.required'=>"Email không được bỏ trống!",
            'email.min'=>"Email phải lớn hơn :min ký tự!",
            'email.max'=>"Email phải nhỏ hơn :max ký tự!",
            'email.regex'=>"Không đúng định dạng Email ví dụ:'abc@gmail.com' !",
            'email.unique'=>"Email đã tồn tại!",

            'ten_dang_nhap.required'=>"Tên đăng nhập không được bỏ trống!",
            'ten_dang_nhap.min'=>"Tên đăng nhập phải lớn hơn :min ký tự!",
            'ten_dang_nhap.max'=>"Tên đăng nhập phải nhỏ hơn :max ký tự!",
            'ten_dang_nhap.regex'=>"Tên đăng nhập không được bắt đầu bằng số, không chứa khoản trắng, không được có dấu và chứa ký tự đặc biệt! ",

            'mat_khau.required'=>"Mật khẩu không được bỏ trống!",
            'mat_khau.min'=>"Mật khẩu phải lớn hơn :min ký tự!",
            'mat_khau.max'=>"Mật khẩu phải nhỏ hơn :max ký tự!",

            'dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',

            'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ phải nhỏ hơn :max ký tự!",
            'dia_chi.regex' => "Địa chỉ không được chứa ký tự đặc biệt!",

    
        ];
    }
}
