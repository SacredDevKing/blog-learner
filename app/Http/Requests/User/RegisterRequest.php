<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
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
            /*
             * Реализуем валидацию для регистрации
             */
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'login' => ['required', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],

        ];
    }
}
