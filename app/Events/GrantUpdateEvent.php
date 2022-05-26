<?php

namespace App\Events;

use App\Models\Grant;

class GrantUpdateEvent
{
    /*
     * В это событие мы передаем наш измененный грант
     */

    public $grant;

    public function __construct(Grant $grant)
    {
        $this->grant = $grant;
    }
}
