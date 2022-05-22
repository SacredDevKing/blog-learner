<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Grant\AdminGrantRequest;
use App\Models\Grant;

class AdminUpdateController extends Controller
{
    /*
     * Изменение гранта в БД админом через API
     */

    public function __invoke(AdminGrantRequest $request, Grant $grant)
    {
        /*
         *  Вношу новые данные в переменную, затем обновляю грант новыми данными
         */

        $data = $request->validated();

        $grant->update($data);

        /*
         * Возвращается ответ, если все хорошо
         */

        return response()
            ->json([
                'status' => true,
                'grant' => $grant
            ])
            ->setStatusCode(200, 'Grant updated');

    }
}
//$grant = new GrantResource($grant->fresh());
