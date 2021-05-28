<?php

namespace Aerni\AppleNews\Listeners;

use Statamic\Events\EntryDeleted;
use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;

class DeleteArticle
{
    public function handle(EntryDeleted $event): void
    {
        if ($this->shouldDeleteArticle($event->entry)) {
            Article::delete($event->entry);
        }
    }

    protected function shouldDeleteArticle(Entry $entry): bool
    {
        if ($entry->get('apple_news_published')) {
            return false;
        }

        if (! $entry->get('apple_news_id')) {
            return false;
        }

        return true;
    }
}
