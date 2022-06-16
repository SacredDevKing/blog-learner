<?php

namespace App\Http\Controllers\Api\Grant;

use App\Http\Controllers\Controller;
use App\Models\Grant;

class IndexController extends Controller
{
    /*
    * Получение списка всех грантов через API
    */

    public function __invoke()
    {
        /*
         * Получение списка всех грантов из БД
         * Сортировка по дате публикации
         */

        $grants = Grant::latest('created_at')->get();

        return response()
            ->json([
                'status' => true,
                'grants' => $grants,
            ])
            ->setStatusCode(200, 'Posts list');
    }
}
