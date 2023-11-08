<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeNaukaRequest extends FormRequest
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
        $id=$this->route('id');
        return ['title' => 'required|unique:naukas,title,'. $id,
        'lid' => 'required', 'content' => 'required',
        'rubric' => 'required','image' => 'required'];
    }
    public function messages()
    {
        return[
        'title.unique' => 'Такая статья уже существует'
        ];
    }
}
?>