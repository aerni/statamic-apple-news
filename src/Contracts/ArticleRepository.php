<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Contracts\Entries\Entry;

interface ArticleRepository
{
    public function make(Entry $entry): Article;

    public function publish(Entry $entry): bool;

    public function delete(Entry $entry): bool;
}
