<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'nome'         => "required|min:5|max:190",
            'telefone'     => "required|min:9",
            'email'        => "required|email",

        ];

        switch($this->method()) {
            case "POST": // CRIAÇÃO DE UM NOVO REGISTRO
                $rules["email"]    .= "|unique:contatos";
                $rules["telefone"] .= "|unique:contatos";
                break;
            case "PUT": // ATUALIZAÇÃO DE UM REGISTRO EXISTENTE
                $rules["email"]    .= "|unique:contatos,email,".$this->id;
                $rules["telefone"] .= "|unique:contatos,telefone,".$this->id;
                break;
            default:break;
        }

        return $rules;
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'nome'         => "trim",
            'telefone'     => "trim",
            'email'        => "trim",

        ];
    }
}
