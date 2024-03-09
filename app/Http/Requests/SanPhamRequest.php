<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
        $id=$this->route('id');
        return [ 
            'ten' => 'required|min:6|max:50|regex:/^[a-zA-Z][a-zA-Z0-9\s]*$/u|unique:san_pham,ten,' . $id,

            'do_phan_giai'=>'required|min:3|max:30',

            'trong_luong'=>'required|numeric|min:100|max:700',

            'mo_ta' => 'required|min:3|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/-]+$/u',

            'kich_thuoc'=>'required|min:10|max:50|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/]+$/u',
           
            'man_hinh'=>'required|numeric|min:1|max:50',

            'he_dieu_hanh' => 'required|min:3|max:50|regex:/^[^0-9,^!@#$%^&*()_+{}\[\]:;<>?~\\/\\-][^!@#$%^&*()_+{}\[\]:;<>?~\\/\\-]+$/u',

            'ram'=>'required|numeric|min:1|max:16',

            'camera'=>'required|min:3|max:50',

            'pin'=>'required|numeric|min:1000|max:6000',

            

        ];
        
    }
    public function messages()
    {
        return[
            'ten.required'=>"Tên sản phẩm không được bỏ trống!",
            'ten.min'=>"Tên sản phẩm phải lớn hơn :min ký tự!",
            'ten.max'=>"Tên sản phẩm phải nhỏ hơn :max ký tự!",
            'ten.unique'=>"Tên sản phẩm không được trùng",
            'ten.regex'=>"Tên sản phẩm không được bắt đầu bằng ký tự là số và không chứa ký tự đặc biệt!",

            'do_phan_giai.required'=>"Độ phân giải không được bỏ trống!",
            'do_phan_giai.min'=>"Độ phân giải phải lớn hơn :min ký tự!",
            'do_phan_giai.max'=>"Độ phân giải sản phẩm phải nhỏ hơn :max ký tự!",
            
            'trong_luong.required'=>"Trọng lượng không được bỏ trống!",
            'trong_luong.min'=>"Trọng lượng phải lớn hơn :min g!",
            'trong_luong.max'=>"Trọng lượng phải nhỏ hơn :max g!",
            
            'mo_ta.required'=>"Mô tả không được bỏ trống!",
            'mo_ta.min'=>"Mô tả phải lớn hơn :min ký tự!",
            'mo_ta.regex'=>"Mô tả không chứa ký tự đặc biệt!",

            'kich_thuoc.required'=>"Kích thước không được bỏ trống!",
            'kich_thuoc.min'=>"Kích thước từ :min đến :max ký tự!",
            'kich_thuoc.max'=>"Kích thước từ :min đến :max ký tự!",
            'kich_thuoc.regex'=>"Kích thước không chứa ký tự đặc biệt!",

            'man_hinh.required'=>"Màn hình không được bỏ trống!",
            'man_hinh.min'=>"Màn hình phải lớn hơn :min inch!",
            'man_hinh.max'=>"Màn hình phải nhỏ hơn :max inch!",
            
            'he_dieu_hanh.required'=>"Hệ điều hành không được bỏ trống!",
            'he_dieu_hanh.min'=>"Hệ điều hành phải lớn hơn :min ký tự!",
            'he_dieu_hanh.max'=>"Hệ điều hành phải nhỏ hơn :max ký tự!",
            'he_dieu_hanh.regex'=>"Hệ điều hành không bắt đầu bằng số và không chứa ký tự đặc biệt!",

            'ram.required'=>"Ram không được bỏ trống!",
            'ram.min'=>"Ram phải lớn hơn :minGB!", 
            'ram.max'=>"Ram phải nhỏ hơn :maxGB!", 

            'camera.required'=>"Camera không được bỏ trống!",
            'camera.min'=>"Camera phải lớn hơn :min ký tự!",
            'camera.max'=>"Camera phải nhỏ hơn :max ký tự!",

            'pin.required'=>"Pin không được bỏ trống!",
            'pin.min'=>"Pin phải lớn hơn :min mAh!", 
            'pin.max'=>"Pin phải nhỏ hơn :max mAh!",


        ];
        
    }
}
