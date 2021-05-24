<?php

namespace Aerni\AppleNews\Contracts;

use Illuminate\Support\Collection;
use Statamic\Contracts\Entries\Entry;
use Aerni\AppleNews\Contracts\Article;

interface ArticleManager
{
    public function getArticleInfo(Entry $entry, string $channelId, bool $refresh = false): array;

    public function publish(Entry $entry, string $channelId): bool;

    public function delete(Entry $entry): bool;

    public function saveToFile(Article $article): self;

    public function deleteFile(Article $article): self;

    public function publishableChannels(Entry $entry): Collection;

    public function publishable(Entry $entry): bool;

    public function publishableTo(Entry $entry, string $channelId): bool;
}
