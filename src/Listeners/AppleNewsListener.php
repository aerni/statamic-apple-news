<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Traits\Publishable;
use Statamic\Entries\Entry;

abstract class AppleNewsListener
{
    use Publishable;

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

    protected function shouldCreateArticle(Entry $entry): bool
    {
        if (! $this->isPublishableCollection($entry->collectionHandle())) {
            return false;
        }

        return true;
    }

    protected function shouldPublishArticle(Entry $entry): bool
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
}
