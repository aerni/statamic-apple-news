<?php

namespace Aerni\AppleNews\Contracts;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\Template;
use Statamic\Contracts\Entries\Entry;

interface ArticleRepository
{
    public function make(Entry $entry, Template $template): Article;

    public function publishable(Entry $entry): bool;
}
