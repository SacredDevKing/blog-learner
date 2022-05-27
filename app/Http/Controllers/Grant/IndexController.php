<?php

namespace App\Http\Controllers\Grant;

use App\Http\Controllers\Controller;
use App\Http\Resources\Grant\GrantResource;
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

        //Делаем колонку "short_content" видимой (по дефолту ее не видно)
        $grant->makeVisible('short_content');

        /*
         * Возвращаем ответ, если все хорошо
         */

        return response()
            ->json([
                'status' => true,
                'grants' => $grants,
            ])
            ->setStatusCode(200, 'Grants list');
    }
}
