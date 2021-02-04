<?php

namespace Aerni\AppleNews\Actions;

use Statamic\Entries\Entry;
use Aerni\AppleNews\Facades\AppleNewsStorage;

class PublishArticleAction
{
    public function execute(Entry $entry): void
    {
        $collection = $entry->collectionHandle();
        $id = $entry->slug();

        $article = AppleNewsStorage::getArticle($collection, $id);

        ray('published');
    }
}
