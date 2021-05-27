<?php

namespace Aerni\AppleNews\Contracts;

use stdClass;

interface Api
{
    /**
     * Get information about the channel.
     */
    public function channel(): stdClass;

    /**
     * Get information about the channel’s sections.
     */
    public function sections(): stdClass;

    /**
     * Get information about a specific section.
     */
    public function section(string $id): stdClass;

    /**
     * Get information about an article.
     */
    public function article(string $id): stdClass;

    /**
     * Search for articles in the channel.
     */
    public function search(array $params = []): stdClass;

    /**
     * Create a new article.
     */
    public function createArticle(array $data): stdClass;

    /**
     * Update an article.
     */
    public function updateArticle(string $id, array $data): stdClass;

    /**
     * Delete an article.
     */
    public function deleteArticle(string $id): string;
}
