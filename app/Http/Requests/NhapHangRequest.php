<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhapHangRequest extends FormRequest
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
            'nha_cung_cap'=>'required',
            'san_pham'=>'required',
            'mau_sac'=>'required',
            'dung_luong'=>'required',
            'so_luong'=>'required',
            'gia_nhap'=>'required|numeric|min:100000|max:200000000',
            'gia_ban'=>'required|numeric|min:100000|max:200000000',
        ];
    }
    public function messages(){
        return[
            'nha_cung_cap.required'=>"Cần chọn nhà cung cấp!",
            'san_pham.required'=>"Cần chọn sản phẩm!",
            'mau_sac.required'=>"Cần chọn màu sắc!",
            'dung_luong.required'=>"Cần chọn dung lượng!",
            'so_luong.required'=>"Cần chọn số lượng phù hợp!",
            'gia_nhap.required'=>"Giá nhập không được bỏ trống!",
            'gia_nhap.min'=>"Giá nhập khi nhập vào phải lớn hơn :min ký tự! ",
            'gia_nhap.max'=>"Giá nhập khi nhập vào phải nhỏ hơn :max ký tự!",
            'gia_ban.required'=>"Cần chọn sản phẩm phù hợp để xuất hiện giá bán!",
        ];
    }
}
