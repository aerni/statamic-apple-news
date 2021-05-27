<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\Article;
use Statamic\Events\EntryDeleted;

class DeleteArticle
{
    public function handle(EntryDeleted $event): void
    {
        Article::delete($event->entry);
    }
}
