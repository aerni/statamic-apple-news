<?php

namespace Aerni\AppleNews\Actions;

use Statamic\Entries\Entry;

class UnpublishArticleAction
{
    public function execute(Entry $entry): void
    {
        ray('unpublished');
    }
}
