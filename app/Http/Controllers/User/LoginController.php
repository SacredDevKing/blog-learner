<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    * Авторизация пользователя через API
    */

    public function __invoke(LoginRequest $request)
    {
        /*
         * Ищем пользователя по логину
         */

        $user = User::where('login', $request->login)->first();

        /*
         * Если пользователь найден и наш введенный пароль совпадает с паролем найденного пользователя, мы возвращаем токен и данные пользователя
         */

        if ($user && $request->password === $user->password) {

            /*
             * Генерируем токен и обновляем у пользователя
             */

            $user->api_token = Str::random(200);
            $user->save();

            /*
             *  Возвращаем ответ, если все хорошо
             */

            return response()
                ->json
                ([
                    'status' => true,
                    'user' => $user
                ])
                ->setStatusCode(200, 'Account authenticated)');
        } else {

            /*
             *  Возвращаем ответ, если все плохо
             */

            return response()->json
            ([
                'status' => false,
            ], 401);
        }
    }
}
