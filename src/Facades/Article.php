<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Article as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Aerni\AppleNews\Contracts\Article from()
 * @method static string id()
 * @method static string title()
 * @method static string locale()
 * @method static string collection()
 * @method static \ChapterThree\AppleNewsAPI\Document\Layouts\Layout layout()
 * @method static array components()
 * @method static array componentTextStyles()
 * @method static \ChapterThree\AppleNewsAPI\Document article()
 * @method static \Aerni\AppleNews\Contracts\Article publish()
 * @method static \Aerni\AppleNews\Contracts\Article unpublish()
 * @method static \Aerni\AppleNews\Contracts\Article saveToFile()
 * @method static \Aerni\AppleNews\Contracts\Article deleteFile()
 * @method static bool published()
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
