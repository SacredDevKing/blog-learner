<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grant;
use App\Models\User;

class AdminDestroyController extends Controller
{
    /*
     * Удаление гранта из БД админом через API
     */

    public function __invoke()
    {
        /*
         * Удаляем грант из БД
         */
        $grant->delete();

        /*
         * Возвращаем ответ о том, что грант удален
         */

        return response()
            ->json([
                'status' => true,
            ])
            ->setStatusCode(200, 'Grant deleted');
    }
}
