<?php

namespace Aerni\AppleNews\Traits;

trait Publishable
{
    protected function isPublishableCollection(string $handle): bool
    {
        $collections = config('apple-news.collections', []);

        if (! in_array($handle, $collections)) {
            return false;
        }

        return true;
    }
}
