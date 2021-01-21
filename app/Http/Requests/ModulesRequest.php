<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModulesRequest extends FormRequest
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
        $rules = [
            'module_type_id' => ['required', 'exists:module_types,id'],
            'ip_adress' => ['regex:/\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?):\d{1,5}\b/'],
        ];

        if ($this->getMethod() == 'POST') { // store
            $rules = [
                'name' => ['required',
                    Rule::unique('modules')->where(function ($query) {
                        $query->where('object_id', $this->request->get('object_id'))->
                        where('name', $this->request->get('name'));
                    })
                ],
            ];
        } else { // update /*TODO: надо разобраться*/
            $rules = [
                'name' => ['required',
                    Rule::unique('modules')->where(function ($query) {
                        $query->where('object_id', $this->request->get('object_id'))->
                        where('name', $this->request->get('name'))->insertOrIgnore(['id' => $this->request->get('module_id')]);
                    })
                ],
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        /*TODO: Настоить сообщения об ошибках*/
        return [
            'name.required' => 'The Name is required.',
            'name.max' => 'The Name may not be greater than 255 characters.',
            //'name.unique' => 'A Type is required',
            'module_type_id.required' => 'A Type is required',
            'module_type_id.exists' => 'The selected Module Type Id is invalid',
            'ip_adress.regex' => 'The IP Address format is invalid.'
        ];
    }
}
