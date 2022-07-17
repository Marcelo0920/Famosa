<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductoRequest extends FormRequest
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
            'nombre' => 'required',
	        'descripcion' => 'required',
	        'precioU' => 'required',
            'image' => '',
	        'stock' => 'required',
	        'cantMin' => 'required',
	        'estado' => 'required',
	        'id_Peso' => 'required',
	        'id_Tipo' => 'required',
            'id_Cat' => ''
        ];
    }
}
