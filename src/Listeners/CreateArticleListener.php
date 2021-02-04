<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\CreateArticleAction;
use Statamic\Events\EntrySaved;

class CreateArticleListener
{
    private $createArticleAction;

    public function __construct(CreateArticleAction $createArticleAction)
    {
        $this->createArticleAction = $createArticleAction;
    }

    public function handle(EntrySaved $event): void
    {
        $this->createArticleAction->execute($event->entry);
    }
}
