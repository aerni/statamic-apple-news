<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\ArticleManager as Contract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getArticleInfo(Entry $entry, string $channelId, bool $refresh = false)
 * @method static bool publish(Entry $entry, string $channelId)
 * @method static bool delete(Entry $entry)
 * @method static \Aerni\AppleNews\Contracts\ArticleManager saveToFile(Article $article)
 * @method static \Aerni\AppleNews\Contracts\ArticleManager deleteFile(Article $article)
 * @method static \Illuminate\Support\Collection publishableChannels(Entry $entry)
 * @method static bool publishable(Entry $entry)
 * @method static bool publishableTo(Entry $entry, string $channelId)
 *
 * @see \Aerni\AppleNews\ArticleManager
 */
class ArticleManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contract::class;
    }
}
