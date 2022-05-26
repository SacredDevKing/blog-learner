<?php

namespace Database\Seeders;

use App\Models\Grant;
use App\Models\User;
use App\Models\UserGrant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Делаем 20 пользователей и 100 грантов
         */

        $users = User::factory(20)->create();
        $grants = Grant::factory(100)->create();

        /*
         * Связываем таблицы users и grants, каждому пользователю добавляем по 5 грантов в избранное
         */

        foreach ($users as $user) {
            $grantsIds = $grants->random(5)->pluck('id');
            $user->grants()->attach($grantsIds);
        }



    }
}
