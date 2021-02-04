<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\UnpublishArticleAction;
use Statamic\Events\EntrySaved;

class UnpublishArticleListener
{
    private $unpublishArticleAction;

    public function __construct(UnpublishArticleAction $unpublishArticleAction)
    {
        $this->unpublishArticleAction = $unpublishArticleAction;
    }

    public function handle(EntrySaved $event): void
    {
        if (! $event->entry->published()) {
            $this->unpublishArticleAction->execute($event->entry);
        }
    }
}
