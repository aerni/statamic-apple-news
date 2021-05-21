<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Facades\AppleNewsArticle;
use Statamic\Events\EntrySaving;

class CreateArticleListener extends AppleNewsListener
{
    public function handle(EntrySaving $event): void
    {
        if ($this->shouldCreateArticle($event->entry)) {
            AppleNewsArticle::create($event->entry);
        }
    }
}
