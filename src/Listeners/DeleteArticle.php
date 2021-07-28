<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntryDeleted;

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
        // Only delete the article if there is an article id.
        if (! $entry->get('apple_news_id')) {
            return false;
        }

        return true;
    }
}
