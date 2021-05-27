<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Contracts\Entries\Entry;

interface ArticleManager
{
    public function getArticleInfo(Entry $entry, bool $refresh = false): array;

    public function publish(Entry $entry, string $template): bool;

    public function delete(Entry $entry): bool;

    public function saveToFile(Article $article): self;

    public function deleteFile(Article $article): self;

    public function isPublishable(Entry $entry): bool;
}
