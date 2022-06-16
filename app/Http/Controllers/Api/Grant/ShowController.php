<?php

namespace App\Http\Controllers\Api\Grant;

use App\Http\Controllers\Controller;
use App\Models\Grant;

class ShowController extends Controller
{
    /*
     * Нахождение одного конкретного гранта
     */

    public function __invoke(Grant $grant)
    {

        //Делаем колонку "content" видимой (по дефолту ее не видно)
        $grant->makeVisible(['content', 'short_content']);

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
