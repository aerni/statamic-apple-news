<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Api as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static stdClass channel()
 * @method static stdClass sections()
 * @method static stdClass section(string $sectionId)
 * @method static stdClass article(string $articleId)
 * @method static stdClass search(array $params = [])
 * @method static stdClass createArticle(array $data)
 * @method static stdClass updateArticle(string $articleId, array $data)
 * @method static string deleteArticle(string $articleId)
 *
 * @see \Aerni\AppleNews\Api
 */
class Api extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
