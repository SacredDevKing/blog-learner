<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CabinetController extends Controller
{
    public function __invoke()
    {
        /*
         * Получаем id авторизированного пользователя
         * В $user помещаем найденного пользователя по id авторизированного пользователя
         * Получаем избранные гранты авторизированного пользователя
         */

        $id = Auth::user()->id;

        $user = User::find($id);

        $favouriteGrants = $user->grants;

        foreach ($user->grants as $grant) {
            $grantNotification = $grant->pivot->is_notification;
        }

        /*
         * Получаем в ответ все избранные гранты пользователя, если они есть
         * Получаем в ответ, что избранных грантов пока что нет у авторизированного пользователя
         */

        if (!$favouriteGrants->isEmpty()) {
            return response()
                ->json([
                    'status' => true,
                    'grants' => $favouriteGrants,
                ])
                ->setStatusCode(200, 'Favourite grants list');
        } else {
            return response()
                ->json([
                    'status' => true,
                    'grants' => 'You have not yet favourites grants',
                ])
                ->setStatusCode(200, 'Favourite grants list');
        }

    }
}
