<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Api as Contract;
use Aerni\AppleNews\Facades\Channel;
use ChapterThree\AppleNewsAPI\PublisherAPI;
use stdClass;

class Api implements Contract
{
    /**
     * Get information about the channel.
     */
    public function channel(): stdClass
    {
        return $this->get('/channels/{channel_id}', [
            'channel_id' => Channel::id(),
        ]);
    }

    /**
     * Get information about the channel’s sections.
     */
    public function sections(): stdClass
    {
        return $this->get('/channels/{channel_id}/sections', [
            'channel_id' => Channel::id(),
        ]);
    }

    /**
     * Get information about a specific section.
     */
    public function section(string $id): stdClass
    {
        return $this->get('/sections/{section_id}', [
            'section_id' => $id,
        ]);
    }

    /**
     * Get information about an article.
     */
    public function article(string $id): stdClass
    {
        return $this->get('/articles/{article_id}', ['article_id' => $id]);
    }

    /**
     * Search for articles in the channel.
     */
    public function search(array $params = []): stdClass
    {
        return $this->get('/channels/{channel_id}/articles', [
            'channel_id' => Channel::id(),
        ], $params);
    }

    /**
     * Create a new article.
     */
    public function createArticle(array $data): stdClass
    {
        return $this->post('/channels/{channel_id}/articles', [
            'channel_id' => Channel::id(),
        ], $data);
    }

    /**
     * Update an article.
     */
    public function updateArticle(string $id, array $data): stdClass
    {
        return $this->post('/articles/{article_id}', [
            'article_id' => $id,
        ], $data);
    }

    /**
     * Delete an article.
     */
    public function deleteArticle(string $id): string
    {
        return $this->delete('/articles/{article_id}', [
            'article_id' => $id,
        ]);
    }

    /**
     * Send a GET request to the Apple News API.
     */
    protected function get(string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api()->get($path, $pathArgs, $data);
    }

    /**
     * Send a POST request to the Apple News API.
     */
    protected function post(string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api()->post($path, $pathArgs, $data);
    }

    /**
     * Send a DELETE request to the Apple News API.
     */
    protected function delete(string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api()->delete($path, $pathArgs, $data);
    }

    /**
     * Returns a publisher API configured for a given channel.
     */
    protected function api(): PublisherAPI
    {
        return new PublisherAPI(Channel::key(), Channel::secret(), 'https://news-api.apple.com');
    }
}
