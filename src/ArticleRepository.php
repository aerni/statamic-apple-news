<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\ArticleRepository as Contract;
use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Facades\Channel;
use Statamic\Contracts\Entries\Entry;

class ArticleRepository implements Contract
{
    public function make(Entry $entry, Template $template): Article
    {
        return resolve(Article::class, ['entry' => $entry, 'template' => $template]);
    }

    public function publishable(Entry $entry): bool
    {
        return in_array($entry->collectionHandle(), Channel::collections());
    }
}
