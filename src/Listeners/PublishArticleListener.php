<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\PublishArticleAction;
use Statamic\Events\EntrySaved;

class PublishArticleListener
{
    private $publishArticleAction;

    public function __construct(PublishArticleAction $publishArticleAction)
    {
        $this->publishArticleAction = $publishArticleAction;
    }

    public function handle(EntrySaved $event): void
    {
        if ($event->entry->published()) {
            $this->publishArticleAction->execute($event->entry);
        }
    }
}
