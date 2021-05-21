<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Data\AppleNewsArticle as Article;
use Illuminate\Support\Facades\Facade;

class AppleNewsArticle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Article::class;
    }
}
