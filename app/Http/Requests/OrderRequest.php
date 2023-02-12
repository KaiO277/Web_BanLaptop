<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        return [
            'name'=> 'required|max:120',
            'sdt'=> 'required|numeric',
            'address'=> 'required',
            'email'=> 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
            'address.required'=> 'Vui lòng nhập địa chỉ',
            'email.required'=> 'Vui lòng nhập email',
            // 'sdt.min'=> 'Vui lòng nhập số điện thoại nhỏ hơn 11 số',
            'sdt.numeric'=> 'Phải là dạng số điện thoại',
            'email.email'=> 'Phải là địa chỉ email',
            'name.max'=> 'Họ và Tên quá dài'
        ];
    }
}
