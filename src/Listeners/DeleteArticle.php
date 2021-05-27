<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\AppleNewsArticle;
use Statamic\Events\EntryDeleted;

class DeleteArticle extends AppleNewsListener
{
    public function handle(EntryDeleted $event): void
    {
        // if ($this->shouldDeleteArticle($event->entry)) {
        //     AppleNewsArticle::delete($event->entry);
        // }
    }
}
