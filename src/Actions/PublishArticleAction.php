<?php

namespace Aerni\AppleNews\Actions;

use Statamic\Entries\Entry;
use Aerni\AppleNews\Facades\AppleNewsStorage;

class PublishArticleAction
{
    public function execute(Entry $entry): Entry
    {
        $collection = $entry->collectionHandle();
        $id = $entry->slug();

        $article = AppleNewsStorage::getArticle($collection, $id);

        // TODO: Throw exception if article doesn't exist

        // TODO: Publish to Apple News with API

        $entry->set('published_on_apple_news', true);

        ray('published');

        return $entry;
    }
}
