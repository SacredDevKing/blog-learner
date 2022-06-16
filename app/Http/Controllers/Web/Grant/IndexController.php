<?php

namespace App\Http\Controllers\Web\Grant;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main');
    }
}
