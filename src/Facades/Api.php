<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Api as Contract;
use Illuminate\Support\Facades\Facade;

class Api extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
