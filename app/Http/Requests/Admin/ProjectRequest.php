<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
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
            'developer_id' => ['not_in:0'],
            'location_id' => ['not_in:0'],
            'type_id' => ['required'],
            'project_area' => ['required' , 'numeric'],
            'home' => ['required'],
            'developer' => ['required'],
            'location' => ['required'],
            'type' => ['required'],
            'about_en' => ['required'],
            'about_ar' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Project image',
            'name_en' => 'Project name (EN)',
            'name_ar' => 'Project name (AR)',
            'brief_en' => 'Project brief (EN)',
            'brief_ar' => 'Project brief (AR)',
            'developer_id' => 'Project developer',
            'location_id' => 'Project location',
            'type_id' => 'Project type',
            'project_area' => 'Project area',
            'home' => 'Featured in home page',
            'developer' => 'Featured in developer\'s page',
            'location' => 'Featured in location\'s page',
            'type' => 'Featured in type\'s page',
        ];
    }
}
