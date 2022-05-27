<?php

namespace App\Http\Controllers\Grant;

use App\Http\Controllers\Controller;
use App\Http\Resources\Grant\GrantResource;
use App\Models\Grant;

class ShowController extends Controller
{
    /*
     * Нахождение одного конкретного гранта
     */

    public function __invoke(Grant $grant)
    {
        /*
         * Находим грант по id
         */

        $grant = Grant::find($grant);

        //Делаем колонку "content" видимой (по дефолту ее не видно)
        $grant->makeVisible('content');

        /*
         * Получаем ответ если все ок
         */
        return response()
            ->json([
                'status' => true,
                'grant' => $grant,
            ])
            ->setStatusCode(200, 'Grant page');


    }
}
