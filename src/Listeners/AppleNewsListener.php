<?php

namespace Aerni\AppleNews\Listeners;

use Statamic\Entries\Entry;
use Aerni\AppleNews\Facades\ArticleManager;

class AppleNewsListener
{
    protected function shouldAppendBlueprint(?Entry $entry): bool
    {
        if (empty($entry)) {
            return false;
        }

        if (! ArticleManager::publishable($entry)) {
            return false;
        }

        return true;
    }

    protected function shouldCreateArticle(Entry $entry): bool
    {
        if (! ArticleManager::publishable($entry)) {
            return false;
        }

        return true;
    }

    protected function shouldPublishArticle(Entry $entry): bool
    {
        if (! ArticleManager::publishable($entry)) {
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
        if (! ArticleManager::publishable($entry)) {
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
        if (! ArticleManager::publishable($entry)) {
            return false;
        }

        return true;
    }
}
