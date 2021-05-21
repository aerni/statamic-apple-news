<?php

namespace Aerni\AppleNews\Facades;

use Illuminate\Support\Facades\Facade;
use Aerni\AppleNews\Data\AppleNewsArticle as Article;

class AppleNewsArticle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Article::class;
    }
}
