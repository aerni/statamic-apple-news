<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntryBlueprintFound;

class UpdateArticleStatus
{
    public function handle(EntryBlueprintFound $event): void
    {
        // The entry will be 'null' before it has been saved the first time. Return to not cause any issues.
        if (! $event->entry) {
            return;
        }

        if ($this->shouldUpdateArticleStatus($event->entry)) {
            //
        }
    }

    protected function shouldUpdateArticleStatus(Entry $entry): bool
    {
        // Update the article status if it is still processing and not live or any other state.

        return true;
    }
}
