<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => ['required','max:1000', 'mimes:jpeg,jpg,png'],
            'slug' => ['required', 'unique:courses', 'max:255'],
            'name' => ['required', 'unique:courses', 'max:255'],
            'description' => ['required', 'max:255']
        ];
    }

    public function message()
    {
        return [
            'image.required' => 'Imagem é obrigatoria',
            'slug.required' => 'O slug é obrigatorio',
            'name.required' => 'O nome do curso é obrigatorio',
            'description.required' => 'O campo de descrição é obrigatório',
            'image.mimes' => 'Os tipos de imagens suportadas são jpg, jpeg, png',
            'slug.unique' => 'Ja existe cupade'
        ];
    }

    
}
