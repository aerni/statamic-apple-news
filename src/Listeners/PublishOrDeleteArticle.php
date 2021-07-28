<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntrySaving;

class PublishOrDeleteArticle
{
    public function handle(EntrySaving $event): void
    {
        // When creating an entry, you won't yet have access to the Apple News section. Return to not cause any issues.
        if (! $event->entry->id()) {
            return;
        }

        if ($this->shouldPublishArticle($event->entry)) {
            Article::publish($event->entry);
        }

        if ($this->shouldDeleteArticle($event->entry)) {
            Article::delete($event->entry);
        }
    }

    protected function shouldPublishArticle(Entry $entry): bool
    {
        // Only publish the article if the "Published" toggle is on.
        if (! $entry->get('apple_news_published')) {
            return false;
        }

        return true;
    }

    protected function shouldDeleteArticle(Entry $entry): bool
    {
        // Only delete the article if the "Published" toggle is off.
        if ($entry->get('apple_news_published')) {
            return false;
        }

        // Only delete the article if there is an article id.
        if (! $entry->get('apple_news_id')) {
            return false;
        }

        return true;
    }
}
