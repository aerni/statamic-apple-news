<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Blueprints\EntryBlueprint;
use Aerni\AppleNews\Facades\Article;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntryBlueprintFound;

class AppendEntryBlueprint
{
    public function handle(EntryBlueprintFound $event): void
    {
        if ($this->shouldAppendBlueprint($event->entry)) {
            $contents = $event->blueprint->contents();

            $entryBlueprint = EntryBlueprint::make()->contents()['sections']['main'];

            $contents['sections']['Apple News'] = $entryBlueprint;

            $event->blueprint->setContents($contents);
        }
    }

    protected function shouldAppendBlueprint(?Entry $entry): bool
    {
        if (empty($entry)) {
            return false;
        }

        if (! Article::publishable($entry)) {
            return false;
        }

        return true;
    }
}
