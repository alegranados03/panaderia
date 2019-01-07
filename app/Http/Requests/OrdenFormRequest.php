<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenFormRequest extends FormRequest
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
            'recibido2'=>'required|numeric|between:0.01,100000.99',
            'tarjeta_credito2'=>'required|string|max:19|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
        ];
    }
}
