<?php

namespace App\Http\Requests\Api;

use App\Http\Response\Api\JsonHttpResponse;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TareasApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nombre' =>'required|string|max:50',
            'descripcion' =>'required|string|max:50',
            'estado' =>'required|in:completada,pendiente',
            'fecha_vencimiento' => 'required|date',

        ];
    }
    protected function failedValidation(Validator $validator){

        throw new HttpResponseException(

            JsonHttpResponse::errorResponse(
            'error en el formulario'.$validator->errors(),
            'error',
            500
            )

        );

    }
}
