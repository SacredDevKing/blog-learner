<?php

namespace App\Http\Controllers\Admin;

use App\Events\GrantUpdateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Grant\AdminGrantRequest;
use App\Models\Grant;
use App\Models\User;


class AdminUpdateController extends Controller
{
    /*
     * Изменение гранта в БД админом через API
     */

    public function __invoke(AdminGrantRequest $request, Grant $grant)
    {
        /*
         * Заполняю грант данными из реквеста и проверяю обновились ли данные атрибуты
         */

        $grant->fill($request->validated());

        $updateGrant = $grant->isDirty(['title', 'short_content', 'content',]);

        /*
         * Если данные являются новыми для гранта
         * Тогда грант обновляется в базе данных
         * И передается в ивент чтобы отослать нужным пользователям письмо об его изменении
         */

        if($updateGrant)
        {

            $grant->save();

            event(new GrantUpdateEvent($grant));
        }

        /*
         * Возвращается ответ
         */

        return response()
            ->json([
                'status' => true,
                'grant' => $grant
            ])
            ->setStatusCode(200, 'Grant updated');
    }
}
