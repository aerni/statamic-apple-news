<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Blueprints\EntryBlueprint;
use Aerni\AppleNews\Facades\Channel;
use Statamic\Contracts\Entries\Entry;
use Statamic\Events\EntryBlueprintFound;

class AppendEntryBlueprint
{
    public function handle(EntryBlueprintFound $event): void
    {
        // The entry will be 'null' before it has been saved the first time. Return to not cause any issues.
        if (! $event->entry) {
            return;
        }

        if ($this->shouldAppendBlueprint($event->entry)) {
            $contents = $event->blueprint->contents();

            $entryBlueprint = EntryBlueprint::make()->contents()['sections']['main'];

            $contents['sections']['Apple News'] = $entryBlueprint;

            $event->blueprint->setContents($contents);
        }
    }

    protected function shouldAppendBlueprint(Entry $entry): bool
    {
        if (! in_array($entry->collectionHandle(), Channel::collections())) {
            return false;
        }

        return true;
    }
}
