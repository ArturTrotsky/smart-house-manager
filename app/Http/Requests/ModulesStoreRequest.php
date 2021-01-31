<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModulesStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
                Rule::unique('modules')
                    ->where('object_id', $this->request->get('object_id'))
            ],
            'module_type_id' => ['required', 'exists:module_types,id'],
            'ip_adress' => ['required', 'regex:/\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?):\d{1,5}\b/'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The Name is required.',
            'name.max' => 'The Name may not be greater than 255 characters.',
            'name.unique' => 'The Name has already been taken.',
            'module_type_id.required' => 'A Type is required',
            'module_type_id.exists' => 'The selected Module Type Id is invalid',
            'ip_adress.required' => 'The IP Address is required.',
            'ip_adress.regex' => 'The IP Address format is invalid.',
        ];
    }
}
