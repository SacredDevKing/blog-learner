<?php

namespace App\Listeners;

use App\Events\GrantUpdateEvent;
use App\Jobs\UpdatedGrantJob;
use App\Mail\UpdateGrantNotification;
use App\Models\Grant;
use App\Notifications\SendGrantUpdatedNotification;
use Illuminate\Support\Facades\Mail;

/*
* Этот класс следит за изменением гранта
* Если грант изменился, то всем пользователям которые выбрали грант и поставили уведомление
* Приходит уведомление на почту
*/

class EmailListener
{

    public function handle(GrantUpdateEvent $event)
    {
        /*
         * Находим id гранта, который был изменен
         */

        $nameGrant = $event->grant->title;

        $grantId = $event->grant->id;

        /*
         *  Нахожу всех пользователей которые были привязаны к этому гранту
         *  И у которых в сводной таблице была опция "Уведомление" включено
         */

        $users = Grant::find($grantId)->users()->wherePivot('is_notification', 1)->get();

        /*
         * Перебираю каждого пользователя, беру его почту
         * И поочередно отправляю каждому сообщение на почту
         */

        foreach ($users as $user) {

            $emails = $user->email;


            UpdatedGrantJob::dispatch($emails, $nameGrant);
//            Mail::to($emails)->send(new UpdateGrantNotification($nameGrant));
//            Mail::send('mail', [], function ($message) use ($nameGrant, $emails) {
//                $message->to($emails)->subject('Your grant ' . $nameGrant . ' is updated');
//            });
        }
    }
}
