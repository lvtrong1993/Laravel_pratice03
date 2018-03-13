<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email'            =>    'required | e-mail | unique:users',
            'txtPassword'         =>    'required ',
            'txtRepeatedPassword' =>    'required  ',//same:password
            'txtFullName'         =>    'required',
           // 'txtAddress'          =>    'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => "Bạn chưa nhập email",
            'email.e_mail' => "Định dạng email chưa đúng",
            'email.unique' => "Email đã tồn tại",
            'txtPassword.required' => "Bạn chưa nhập password",
            'txtFullName.required' => "Bạn chưa nhập fullname",
            'txtRepeatedPassword.required' => "Bạn chưa nhập lại password",
          // 'txtRepeatedPassword.same' => "Password nhập không giống nhau",
        ];
    }
}
