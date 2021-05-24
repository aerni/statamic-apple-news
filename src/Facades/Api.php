<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\Api as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static stdClass channel($channelId)
 * @method static stdClass sections(string $channelId)
 * @method static stdClass section(string $channelId, string $sectionId)
 * @method static stdClass article(string $channelId, string $articleId)
 * @method static stdClass search(string $channelId, array $params = [])
 * @method static stdClass createArticle(string $channelId, array $data)
 * @method static stdClass updateArticle(string $channelId, string $articleId, array $data)
 * @method static string deleteArticle(string $channelId, string $articleId)
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
