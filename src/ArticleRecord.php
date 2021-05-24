<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\ArticleRecord as Contract;
use Illuminate\Support\Collection;
use Statamic\Contracts\Entries\Entry;

class ArticleRecord implements Contract
{
    public function get(Entry $entry): Collection
    {
        return collect($entry->get('apple_news'));
    }

    public function update(Entry $entry, array $record): bool
    {
        return $entry->set('apple_news', $record)->save();
    }

    public function delete(Entry $entry): bool
    {
        return $entry->remove('apple_news')->save();
    }
}
