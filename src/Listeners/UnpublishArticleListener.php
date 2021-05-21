<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\AppleNewsArticle;
use Statamic\Events\EntrySaving;

class UnpublishArticleListener extends AppleNewsListener
{
    public function handle(EntrySaving $event): void
    {
        if ($this->shouldUnpublishArticle($event->entry)) {
            AppleNewsArticle::unpublish($event->entry);
        }
    }
}
