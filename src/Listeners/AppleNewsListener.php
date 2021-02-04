<?php

namespace Aerni\AppleNews\Listeners;

use Statamic\Entries\Entry;

abstract class AppleNewsListener
{
    protected function shouldAppendBlueprint(?Entry $entry): bool
    {
        if (empty($entry)) {
            return false;
        }

        if (! $this->isValidCollection($entry->collectionHandle())) {
            return false;
        }

        return true;
    }
}
