<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeveloperRequest extends FormRequest
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
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => $this->isMethod('post') ? ['required' , 'image' , 'mimes:png,jpg,jpeg' ,'max:2048'] : ['image' , 'mimes:png,jpg,jpeg' ,'max:2048'],
            'name_en' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255'],
            'phone' => ['required'],
            'email' => $this->email ? ['string' , 'email' , 'max:255'] : '',
            'brief_en' => ['required'],
            'brief_ar' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'name_en' => 'Developer name (EN)',
            'name_ar' => 'Developer name (AR)',
            'brief_en' => 'Developer brief (EN)',
            'brief_ar' => 'Developer brief (AR)',
            'image' => 'Developer logo',
            'phone' => 'Developer phone number',
            'email' => 'Developer email address'
        ];
    }
}
