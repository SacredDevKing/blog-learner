<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grant\AdminGrantRequest;
use App\Http\Resources\Grant\GrantResource;
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

        new GrantResource(Grant::create($data));

        /*
         * Возвращаем ответ, если все хорошо
         */

        return response()
            ->json(['status' => true])
            ->setStatusCode(201, 'Grant is created');
    }
}
