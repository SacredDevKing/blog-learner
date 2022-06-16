<?php

namespace App\Http\Controllers\Web\Grant;

use App\Http\Controllers\Controller;
use App\Models\Grant;

class ShowController extends Controller
{
    public function __invoke(Grant $grant)
    {
        return view('show');
    }
}
