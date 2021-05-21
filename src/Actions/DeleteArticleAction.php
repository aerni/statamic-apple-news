<?php

namespace Aerni\AppleNews\Actions;

use Aerni\AppleNews\Facades\AppleNewsStorage;
use Statamic\Entries\Entry;

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
