<?php

namespace Aerni\AppleNews\Data;

use Aerni\AppleNews\Actions\CreateArticleAction;
use Aerni\AppleNews\Actions\DeleteArticleAction;
use Aerni\AppleNews\Actions\PublishArticleAction;
use Aerni\AppleNews\Actions\UnpublishArticleAction;
use Aerni\AppleNews\Contracts\AppleNewsArticleContract;
use Statamic\Entries\Entry;

class AppleNewsArticle implements AppleNewsArticleContract
{
    private CreateArticleAction $createArticleAction;
    private PublishArticleAction $publishArticleAction;
    private UnpublishArticleAction $unpublishArticleAction;
    private DeleteArticleAction $deleteArticleAction;

    public function __construct(
        CreateArticleAction $createArticleAction,
        PublishArticleAction $publishArticleAction,
        UnpublishArticleAction $unpublishArticleAction,
        DeleteArticleAction $deleteArticleAction
    ) {
        $this->createArticleAction = $createArticleAction;
        $this->publishArticleAction = $publishArticleAction;
        $this->unpublishArticleAction = $unpublishArticleAction;
        $this->deleteArticleAction = $deleteArticleAction;
    }

    public function create(Entry $entry): void
    {
        $this->createArticleAction->execute($entry);
    }

    public function publish(Entry $entry): Entry
    {
        return $this->publishArticleAction->execute($entry);
    }

    public function unpublish(Entry $entry): Entry
    {
        return $this->unpublishArticleAction->execute($entry);
    }

    public function delete(Entry $entry): void
    {
        $this->deleteArticleAction->execute($entry);
    }

    public function isPublished(Entry $entry): bool
    {
        // TODO: Make a request to the API to check if the entry exists

        if (! $entry->published()) {
            return false;
        }

        if (! $entry->get('published_on_apple_news')) {
            return false;
        }

        return true;
    }
}
