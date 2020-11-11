<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = '';
        $path = explode('/', FormRequest::getPathInfo());
        if(count($path) > 3){
            if($path[3] === 'edit'){
                $id = $path[4];
            }
        }
        return [
            'image' => [Rule::requiredIf(function(){
                return FormRequest::getPathInfo() === "/dashboard/new";
            }),'max:1000', 'mimes:jpeg,jpg,png'],
            'slug' => ['required', Rule::unique('courses')->ignore($id), 'max:255'],
            'name' => ['required', Rule::unique('courses')->ignore($id), 'max:255'],
            'description' => ['required', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Imagem é obrigatoria.',
            'image.max' => 'A imagem ultrapassou o tamanho limite.',
            'slug.required' => 'O slug é obrigatorio.',
            'slug.unique' => 'Ja existe um curso com esse slug.',
            'slug.max' => 'A descrição é ultrapassou o limite de 255 caracteres.',
            'name.required' => 'O nome do curso é obrigatorio.',
            'name.unique' => 'Esse nome já está em uso',
            'description.required' => 'O campo de descrição é obrigatório.',
            'image.mimes' => 'Os tipos de imagens suportadas são jpg, jpeg, png.'
        ];
    }

    
}
