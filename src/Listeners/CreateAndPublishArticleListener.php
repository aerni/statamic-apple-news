<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\CreateArticleAction;
use Aerni\AppleNews\Actions\PublishArticleAction;
use Statamic\Events\EntrySaved;

class CreateAndPublishArticleListener extends AppleNewsListener
{
    private $createArticleAction;
    private $publishArticleAction;

    public function __construct(CreateArticleAction $createArticleAction, PublishArticleAction $publishArticleAction)
    {
        $this->createArticleAction = $createArticleAction;
        $this->publishArticleAction = $publishArticleAction;
    }

    public function handle(EntrySaved $event): void
    {
        if ($this->shouldCreateAndPublishArticle($event->entry)) {
            $this->createArticleAction->execute($event->entry);
            $this->publishArticleAction->execute($event->entry);
        }
    }
}
