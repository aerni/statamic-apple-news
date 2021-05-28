<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntryBlueprintFound;

class UpdateArticleState
{
    public function handle(EntryBlueprintFound $event): void
    {
        // The entry will be 'null' before it has been saved the first time. Return to not cause any issues.
        if (! $event->entry) {
            return;
        }

        if ($this->shouldUpdateArticleState($event->entry)) {
            Article::updateState($event->entry);
        }
    }

    protected function shouldUpdateArticleState(Entry $entry): bool
    {
        if (! $entry->get('apple_news_state')) {
            return false;
        }

        return true;
    }
}
