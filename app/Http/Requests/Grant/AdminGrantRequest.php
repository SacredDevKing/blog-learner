<?php

namespace App\Http\Requests\Grant;
use App\Http\Requests\ApiRequest;

class AdminGrantRequest extends ApiRequest
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
             * Реализуем валидацию для взаимодействия админа с грантами(создание, редактирование, удаление)
             */
            'title' => ['required'],
            'short_content' => 'string',
            'content' => ['required'],
            'image' => 'string',
        ];
    }
}
