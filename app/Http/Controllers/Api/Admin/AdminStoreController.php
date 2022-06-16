<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grant\AdminGrantRequest;
use App\Models\Grant;

class AdminStoreController extends Controller
{
    /*
    * Добавление гранта в БД админом через API
    */

    public function __invoke(AdminGrantRequest $request)
    {
        /*
         * Добавляем грант в БД
         */

        $data = $request->validated();

        Grant::create($data);

        /*
         * Возвращаем ответ, если все хорошо
         */

        return response()
            ->json(['status' => true])
            ->setStatusCode(201, 'Grant is created');
    }
}
