<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRoomsRequest extends FormRequest
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
            'name'=>'required|min:5|max:50',
            'description'=>'required|min:10|max:200',
            'path_image'=>'sometimes|required|image'
        ];
    }

    public function attributes()
    {
        return [
            'path_image' => 'imagen de la sala',
            'name' => 'nombre de la sala',
            'description' =>  'descripción de la sala',
        ];
    }
}
