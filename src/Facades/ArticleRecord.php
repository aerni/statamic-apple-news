<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\ArticleRecord as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection get(Entry $entry)
 * @method static bool update(Entry $entry, array $record)
 * @method static bool delete(Entry $entry)
 *
 * @see \Aerni\AppleNews\ArticleRecord
 */
class ArticleRecord extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
