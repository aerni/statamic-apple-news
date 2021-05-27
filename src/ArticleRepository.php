<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Facades\Channel;
use Statamic\Contracts\Entries\Entry;
use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Facades\Template as TemplateRepository;
use Aerni\AppleNews\Contracts\ArticleRepository as Contract;

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
