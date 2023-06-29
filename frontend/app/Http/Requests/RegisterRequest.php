<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'username' => 'required|min:6',
            'fullname' => 'required|min:6',
            'password' => 'required|min:6|max:24',
            'confirm' => 'same:password|required',
        ];
    }

    public function messages()
    {
        return [
                'username.required' => '',
                'fullname.required' => '',
                'fullname.min' => '',
                'password.required' => '',
                'password.min' => '',
                'password.max' => '',
                'confirm.same' => '',
                'required' => ''  
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                toastr()->error('nhập thiếu thông tin');
            }
        });
    }
}
