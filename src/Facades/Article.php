<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Article as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \ChapterThree\AppleNewsAPI\Document from(Entry $entry)
 *
 * @see \Aerni\AppleNews\BaseArticle
 */
class Article extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
