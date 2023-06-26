<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'project_name' => 'required',
            'url' => 'required',
            'description' => 'required',
            'status' => 'required',
            'license' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'project_name.required' =>'Il nome è un campo obbligatorio',
            'url.required' =>'l\'url è un campo obbligatorio',
            'description.required' =>'La descrizione è un campo obbligatorio',
            'status.required' =>'Lo stato è un campo obbligatorio',
            'license.required' =>'La licenza è un campo obbligatorio'
        ];
    }
}
