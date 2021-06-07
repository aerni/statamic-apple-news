<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Storage as Contract;
use Illuminate\Support\Facades\Facade;

class Storage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
