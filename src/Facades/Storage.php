<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Storage as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string get(string $collection, string $id)
 * @method static void put(string $collection, string $id, string $article)
 * @method static void delete(string $collection, string $id)
 *
 * @see \Aerni\AppleNews\Storage
 */
class Storage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
