<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grant;

class AdminDestroyController extends Controller
{
    /*
     * Удаление гранта из БД админом через API
     */

    public function __invoke(Grant $grant)
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
