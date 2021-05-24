<?php

namespace Aerni\AppleNews\Contracts;

use stdClass;

interface Api
{
    public function channel($channelId): stdClass;

    public function sections(string $channelId): stdClass;

    public function section(string $channelId, string $sectionId): stdClass;

    public function article(string $channelId, string $articleId): stdClass;

    public function search(string $channelId, array $params = []): stdClass;

    public function createArticle(string $channelId, array $data): stdClass;

    public function updateArticle(string $channelId, string $articleId, array $data): stdClass;

    public function deleteArticle(string $channelId, string $articleId): string;
}
