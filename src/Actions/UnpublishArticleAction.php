<?php

namespace Aerni\AppleNews\Actions;

use Statamic\Entries\Entry;

class UnpublishArticleAction
{
    public function execute(Entry $entry): Entry
    {
        // TODO: Unpublish from Apple News with API

        ray('unpublished');

        return $entry;
    }
}
