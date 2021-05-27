<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\ArticleRepository;
use Illuminate\Support\Facades\Facade;

class Article extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ArticleRepository::class;
    }
}
