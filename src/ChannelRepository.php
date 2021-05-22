<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Channel;
use Aerni\AppleNews\Contracts\ChannelRepository as Contract;
use Illuminate\Support\Collection;

class ChannelRepository implements Contract
{
    private Collection $channels;

    public function __construct()
    {
        $this->channels = $this->hydrate();
    }

    public function all(): Collection
    {
        return $this->channels;
    }

    public function find(string $id): ?Channel
    {
        return $this->channels->first(function ($channel) use ($id) {
            return $channel->id() === $id;
        });
    }

    public function findByHandle(string $handle): ?Channel
    {
        return $this->channels->first(function ($channel, $key) use ($handle) {
            return $key === $handle;
        });
    }

    public function findByCollection(string $handle): ?Channel
    {
        return $this->channels->first(function ($channel) use ($handle) {
            return $channel->collection() === $handle;
        });
    }

    private function hydrate(): Collection
    {
        return collect(config('apple-news.channels'))->map(function ($channel, $key) {
            return resolve(Channel::class, [
                'config' => array_merge($channel, ['handle' => $key])
            ]);
        });
    }
}
