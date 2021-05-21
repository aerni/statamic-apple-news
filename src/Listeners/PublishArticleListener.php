<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\AppleNewsArticle;
use Statamic\Events\EntrySaving;

class PublishArticleListener extends AppleNewsListener
{
    public function handle(EntrySaving $event): void
    {
        if ($this->shouldPublishArticle($event->entry)) {
            AppleNewsArticle::publish($event->entry);
        }
    }
}
