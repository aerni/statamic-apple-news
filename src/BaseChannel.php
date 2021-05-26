<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Channel;
use ChapterThree\AppleNewsAPI\Document;
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

    public function canPublish(Entry $entry): bool
    {
        return $entry->published();
    }

    public function createArticle(Entry $entry, string $template): Document
    {
        return resolve($template)->from($entry);
    }

    abstract public function matchEntry(Entry $entry): bool;

    abstract public function templates(): array;
}
