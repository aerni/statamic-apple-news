<?php

namespace Aerni\AppleNews\Contracts;

use Illuminate\Support\Collection;
use Statamic\Contracts\Entries\Entry;

interface ArticleRecord
{
    /**
     * Get the article record.
     */
    public function get(Entry $entry): Collection;

    /**
     * Update the article record.
     */
    public function update(Entry $entry, array $record): bool;

    /**
     * Delete the article record.
     */
    public function delete(Entry $entry): bool;
}
