<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\Channel;
use Statamic\Contracts\Entries\Entry;

abstract class BaseChannel implements Channel
{
    protected string $handle;
    protected string $id;
    protected string $key;
    protected string $secret;

    public function __construct(array $config)
    {
        $this->handle = $config['handle'];
        $this->id = $config['id'];
        $this->key = $config['key'];
        $this->secret = $config['secret'];
    }

    public function handle(): string
    {
        return $this->handle;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function secret(): string
    {
        return $this->secret;
    }

    public function matchEntry(Entry $entry): bool
    {
        return true;
    }

    public function canPublish(Entry $entry): bool
    {
        return $entry->published();
    }

    abstract public function createArticle(Entry $entry): Article;
}
