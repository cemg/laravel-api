<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'uploadFile' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ];
    }
    
    public function messages() {
        return [
            'image' => ':attribute alanı resim olmalıdır.',
        ];
    }
}
