<?php

namespace Aerni\AppleNews\Facades;

use Illuminate\Support\Facades\Facade;
use Aerni\AppleNews\Storage\AppleNewsStorage as Storage;

class AppleNewsStorage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Storage::class;
    }
}
