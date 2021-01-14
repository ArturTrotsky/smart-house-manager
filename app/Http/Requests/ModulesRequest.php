<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'module_type_id' => ['required'],
            'name' => 'required|unique:modules,name,' . $this->name . ',id,object_id,' . $this->object_id,
            'ip_adress' => ['regex:/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}:[0-9]{1,5}/'],
        ];

        return $rules;
    }

    /*TODO: Настоить сообщения об ошибках и ip_adress*/
}
