<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
          'primerNombre' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'segundoNombre' => 'string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'primerApellido' => 'required|string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'segundoApellido' => 'string|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'direccion'=>'string|max:100',
          'email' => 'string|email|max:100|unique:users',
          'username'=>'string|max:50|unique:users',

        ];
    }

   public function messages()
   {
       return [

         'primerNombre.regex' => 'No debe escribir ningún número',
         'segundoNombre.regex' => 'No debe escribir ningún número',
         'primerApellido.regex' => 'No debe escribir ningún número',
         'segundoApellido.regex' => 'No debe escribir ningún número',
         'direccion'=>'string|max:100',
         'email.unique' => 'Este correo ya ha sido registrado',
         'username.unique'=>'Este usuario ya ha sido tomado',
       ];
   }
}
