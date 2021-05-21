<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Storage\AppleNewsStorage as Storage;
use Illuminate\Support\Facades\Facade;

class AppleNewsStorage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Storage::class;
    }
}
