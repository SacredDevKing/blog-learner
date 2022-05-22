<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Support\Str;

class CabinetController extends Controller
{
    public function __invoke(User $user, Grant $grant)
    {
        /*
         * Избранные гранты в разработке
         */

        // $grants = Grant::where($user, $grant);

        // return response()
        //    ->json([
        //        'status' => true,
        //        'grants' => $grants,
        //    ])
        //    ->setStatusCode(200, 'Favourite grants list');
    }

}
