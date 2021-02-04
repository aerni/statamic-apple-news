<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\DeleteArticleAction;
use Statamic\Events\EntryDeleted;

class DeleteArticleListener
{
    private $deleteArticleAction;

    public function __construct(DeleteArticleAction $deleteArticleAction)
    {
        $this->deleteArticleAction = $deleteArticleAction;
    }

    public function handle(EntryDeleted $event): void
    {
        $this->deleteArticleAction->execute($event->entry);
    }
}
