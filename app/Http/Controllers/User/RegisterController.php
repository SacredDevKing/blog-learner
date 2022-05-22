<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class RegisterController extends Controller
{
    /*
    * Регистрация пользователя через API
    */

    public function __invoke(RegisterRequest $request)
    {
        /*
         * Добавляем пользователя в БД
         */

       $data = $request->validated();

       new UserResource(User::create($data));

       /*
        * Возвращаем ответ, если все хорошо
        */

        return response()
            ->json(['status' => true])
            ->setStatusCode(201, 'Account registered');
    }
}
