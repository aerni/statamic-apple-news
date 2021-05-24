<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Article as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Aerni\AppleNews\Contracts\Article from()
 *
 * @see \Aerni\AppleNews\Article
 */
class Article extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
