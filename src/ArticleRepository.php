<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\ArticleRepository as Contract;
use Statamic\Contracts\Entries\Entry;

class ArticleRepository implements Contract
{
    public function make(Entry $entry): Article
    {
        return resolve(Article::class, ['entry' => $entry]);
    }

    public function publish(Entry $entry): bool
    {
        return $this->make($entry)->publish();
    }

    public function delete(Entry $entry): bool
    {
        return $this->make($entry)->delete();
    }
}
