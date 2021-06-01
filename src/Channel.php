<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Channel as Contract;

class Channel implements Contract
{
    protected string $id;
    protected string $key;
    protected string $secret;
    protected string $site;
    protected array $collections;
    protected array $templates;

    public function __construct()
    {
        $config = config('apple-news');

        $this->id = $config['id'];
        $this->key = $config['key'];
        $this->secret = $config['secret'];
        $this->site = $config['site'];
        $this->collections = $config['collections'];
        $this->templates = $config['templates'];
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

    public function site(): string
    {
        return $this->site;
    }

    public function collections(): array
    {
        return $this->collections;
    }

    public function templates(): array
    {
        return $this->templates;
    }
}
