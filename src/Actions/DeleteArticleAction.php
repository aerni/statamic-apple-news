<?php

namespace Aerni\AppleNews\Actions;

use Statamic\Entries\Entry;
use Aerni\AppleNews\Facades\AppleNewsStorage;

class DeleteArticleAction
{
    public function execute(Entry $entry): void
    {
        $collection = $entry->collectionHandle();
        $id = $entry->slug();

        AppleNewsStorage::deleteArticle($collection, $id);

        ray('deleted');
    }
}
