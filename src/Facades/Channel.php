<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\ChannelRepository;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Support\Collection all()
 * @method static null|\Aerni\AppleNews\Contracts\Channel find(string $id)
 * @method static null|\Aerni\AppleNews\Contracts\Channel findByHandle(string $handle)
 * @method static null|\Aerni\AppleNews\Contracts\Channel findByCollection(string $handle)
 *
 * @see \Aerni\AppleNews\Channel
 */
class Channel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ChannelRepository::class;
    }
}
