<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMasterclassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_category' => 'required',
            'name_MC' => 'required|unique:masterclass',
            'description_MC' => 'required',
            'date_MC' => 'required',
            'time_MC' => 'required',
            'count_people_MC' => 'required',
            'cost_MC' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_category.required' => 'Поле "id категории" обязательно для заполнения',
            'name_MC.required' => 'Поле "название мастер-класса" обязательно для заполнения',
            'name_MC.unique' => 'Мастер-класс с таким названием уже существует',
            'description_MC.required' => 'Поле "описание мастер-класса" обязательно для заполнения',
            'date_MC.required' => 'Поле "дата мастер-класса" обязательно для заполнения',
            'time_MC.required' => 'Поле "время мастер-класса" обязательно для заполнения',
            'count_people_MC.required' => 'Поле "количество участников мастер-класса" обязательно для заполнения',
            'cost_MC.required' => 'Поле "стоимость мастер-класса" обязательно для заполнения'
        ];
    }
}
