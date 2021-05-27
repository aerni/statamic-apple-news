<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Contracts\Entries\Entry;

interface ArticleRepository
{
    public function make(Entry $entry, Template $template): Article;

    public function publishable(Entry $entry): bool;
}
