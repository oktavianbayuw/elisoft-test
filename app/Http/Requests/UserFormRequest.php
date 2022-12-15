<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    public $validator = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password'  => 'required|min:8'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $parameter = $this->route()->parameter('user');

            $rules['email'] = [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($parameter),
            ];
        }

        return $rules;
    }
}
