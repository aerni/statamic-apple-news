<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Channel as Contract;
use Illuminate\Support\Facades\Facade;

class Channel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
