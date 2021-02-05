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

        if (! $this->isPublishableCollection($entry->collectionHandle())) {
            return false;
        }

        return true;
    }

    protected function shouldCreateAndPublishArticle(Entry $entry): bool
    {
        if (! $this->isPublishableCollection($entry->collectionHandle())) {
            return false;
        }

        if (! $entry->published()) {
            return false;
        }

        if (! $entry->get('published_on_apple_news')) {
            return false;
        }

        return true;
    }

    protected function shouldUnpublishArticle(Entry $entry): bool
    {
        if (! $this->isPublishableCollection($entry->collectionHandle())) {
            return false;
        }

        if (! $entry->published()) {
            return true;
        }

        if (! $entry->get('published_on_apple_news')) {
            return true;
        }

        return false;
    }

    protected function shouldDeleteArticle(Entry $entry): bool
    {
        if (! $this->isPublishableCollection($entry->collectionHandle())) {
            return false;
        }

        return true;
    }

    protected function isPublishableCollection(string $handle): bool
    {
        $collections = config('apple-news.collections', []);

        if (! in_array($handle, $collections)) {
            return false;
        }

        return true;
    }
}
