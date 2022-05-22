<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/*
 * От этого реквеста заимствуются другие реквесты
 */

class ApiRequest extends FormRequest
{
    /*
     * Реализация функции которая возвращает http ошибки
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
