<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\Channel as Contract;
use Statamic\Contracts\Entries\Entry;

class Channel implements Contract
{
    private string $handle;
    private string $id;
    private string $key;
    private string $secret;
    private string $collection;
    private string $layout;

    public function __construct(array $config)
    {
        $this->handle = $config['handle'];
        $this->id = $config['id'];
        $this->key = $config['key'];
        $this->secret = $config['secret'];
        $this->collection = $config['collection'];
        $this->layout = $config['layout'];
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

    public function collection(): string
    {
        return $this->collection;
    }

    public function layout(): string
    {
        return $this->layout;
    }

    public function matchEntry(Entry $entry): bool
    {
        return $entry->collectionHandle() === $this->collection;
    }

    public function canPublish(Entry $entry): bool
    {
        return $entry->published();
    }

    public function createArticle(Entry $entry): Article
    {
        return resolve($this->layout(), [$entry]);
    }
}
