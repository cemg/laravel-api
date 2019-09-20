<?php

namespace App\Http\Requests;

class UserStoreRequest extends BaseFormRequest
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
            'email'    => 'required|email|unique:users',
            'name'     => 'required|string|max:50',
            'password' => 'required'
        ];
    }
    
    public function messages() {
        return [
            'email.required' => 'Email alanı gereklidir.',
            'name.required' => 'Name alanı gereklidir.',
            'password.required' => 'Password alanı gereklidir.',
            'email.unique' => 'Bu email adresi ile daha önce kayıt olunmuş.'
        ];
    }
}
