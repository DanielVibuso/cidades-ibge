<?php

namespace App\Http\Requests;

use App\Helpers\DataProvidersHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityListRequest extends FormRequest
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
                'uf' => ['required', Rule::in(DataProvidersHelper::validUf())],
                'page' => 'required|numeric'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'uf.required' => 'É necessário informar o UF que deseja listar as cidades',
            'uf.in' => 'É necessário informar um UF válido',
            'page.required' => 'É necessário informar o número da pagina',
            'page.numeric' => 'É necessário informar um valor numérico para a página',
        ];
    }
}
