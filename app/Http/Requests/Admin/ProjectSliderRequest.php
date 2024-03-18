<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectSliderRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first() , 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'images' => $this->isMethod('post') ? ['required' , 'array' , 'min:1'] : '',
            'images.*' => $this->isMethod('post') ? ['required' , 'image' , 'max:2048' ,'mimes:png,jpg,jpeg'] : '',
            'image' => $this->isMethod('put') ? ['image' , 'max:2048' ,'mimes:png,jpg,jpeg'] : '',
            'type' => ['not_in:0']
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'Slider type'
        ];   
    }
}
