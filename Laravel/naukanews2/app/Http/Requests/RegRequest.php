<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'login' => 'required|unique:users|string|max:30',
            'password'=>'required|string|max:50'
        ];
    }
    public function messages()
    {
        return[
        'login.unique' => 'Такой пользователь уже существует'
        ];
    }
}
