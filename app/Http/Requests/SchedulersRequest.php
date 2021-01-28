<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchedulersRequest extends FormRequest
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

    private $period = ['every_day', 'every_week', 'every_work_day', 'weekend'];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'module_id' => ['required', 'exists:modules,id'],
            'value' => ['required', 'integer'],
            'period' => ['required', Rule::in($this->period)],
            'on_time' => ['date_format:H:i'],
            'off_time' => ['date_format:H:i'],
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'value.required' => 'The Value is required.',
            'value.integer' => 'The Value must be an integer.',
            'period.required' => 'The Period is required.',
            'on_time.date_format' => 'The Time ON does not match the format H:i.',
            'off_time.date_format' => 'The Time OFF does not match the format H:i.',
        ];
    }
}
