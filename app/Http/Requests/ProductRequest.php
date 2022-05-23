<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'        => 'required',
            'description' => 'required|min:20',
            'body'       => 'required|min:30',
            'price' => 'required',
            'categories' => 'required',
            'photos.*' => 'image',
        ];
    }

    public function messages(){
        return[
            'min' => 'O campo deve ter no minimo :min caracteres',
            'required'  => 'Esse campo é obrigatório',
            'image' => 'Arquivo não e uma imagem válida, tipos aceitos: PNG, JPEG, JPG',
        ];        
    }
}
