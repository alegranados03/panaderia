<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
          'nombre_producto' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'imagen'=>'required|image',
          'precio'=>'required|numeric|between:0,100000.99',

        ];
    }

   public function messages()
   {
       return [
         'nombre_producto.required' => 'Debe escribir un nombre para el producto',
         'nombre_producto.regex' => 'No debe escribir ningún número',
         'imagen.required'=>'No se ha agregado ninguna imagen, debe agregar la imagen del producto',
         'imagen.image'=>'No se ha agregado ninguna imagen, debe agregar la imagen del producto',
         'precio.numeric'=>'No es el formato correcto de precio',
       ];
   }
}
