<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Contracts\Entries\Entry;

interface ArticleRepository
{
    /**
     * Make an article from an entry.
     */
    public function make(Entry $entry): Article;

    /**
     * Publish an article from an entry.
     */
    public function publish(Entry $entry): bool;

    /**
     * Delete an article from an entry.
     */
    public function delete(Entry $entry): bool;

    /**
     * Get the state of an article from an entry.
     */
    public function state(Entry $entry): string;
}
