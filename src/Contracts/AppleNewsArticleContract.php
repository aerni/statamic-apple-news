<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Entries\Entry;

interface AppleNewsArticleContract
{
    public function create(Entry $entry): void;

    public function publish(Entry $entry): Entry;

    public function unpublish(Entry $entry): Entry;

    public function delete(Entry $entry): void;

    public function isPublished(Entry $entry): bool;
}
