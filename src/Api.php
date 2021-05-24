<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Api as Contract;
use Aerni\AppleNews\Facades\Channel;
use ChapterThree\AppleNewsAPI\PublisherAPI;
use stdClass;

class Api implements Contract
{
    /**
     * Get information about a channel.
     */
    public function channel($channelId): stdClass
    {
        return $this->get($channelId, '/channels/{channel_id}', [
            'channel_id' => $channelId,
        ]);
    }

    /**
     * Get information about a channel’s sections.
     */
    public function sections(string $channelId): stdClass
    {
        return $this->get($channelId, '/channels/{channel_id}/sections', [
            'channel_id' => $channelId,
        ]);
    }

    /**
     * Get information about a section.
     */
    public function section(string $channelId, string $sectionId): stdClass
    {
        return $this->get($channelId, '/sections/{section_id}', [
            'section_id' => $sectionId,
        ]);
    }

    /**
     * Get information about an article.
     */
    public function article(string $channelId, string $articleId): stdClass
    {
        return $this->get($channelId, '/articles/{article_id}', ['article_id' => $articleId]);
    }

    /**
     * Search for articles in a channel.
     */
    public function search(string $channelId, array $params = []): stdClass
    {
        return $this->get($channelId, '/channels/{channel_id}/articles', [
            'channel_id' => $channelId,
        ], $params);
    }

    /**
     * Create a new article.
     */
    public function createArticle(string $channelId, array $data): stdClass
    {
        return $this->post($channelId, '/channels/{channel_id}/articles', [
            'channel_id' => $channelId,
        ], $data);
    }

    /**
     * Update an article.
     */
    public function updateArticle(string $channelId, string $articleId, array $data): stdClass
    {
        return $this->post($channelId, '/articles/{article_id}', [
            'article_id' => $articleId,
        ], $data);
    }

    /**
     * Delete an article.
     */
    public function deleteArticle(string $channelId, string $articleId): string
    {
        return $this->delete($channelId, '/articles/{article_id}', [
            'article_id' => $articleId,
        ]);
    }

    /**
     * Send a GET request to the Apple News API.
     */
    protected function get(string $channelId, string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api($channelId)->get($path, $pathArgs, $data);
    }

    /**
     * Send a POST request to the Apple News API.
     */
    protected function post(string $channelId, string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api($channelId)->post($path, $pathArgs, $data);
    }

    /**
     * Send a DELETE request to the Apple News API.
     */
    protected function delete(string $channelId, string $path, array $pathArgs = [], array $data = [])
    {
        return $this->api($channelId)->delete($path, $pathArgs, $data);
    }

    /**
     * Returns a publisher API configured for a given channel.
     */
    protected function api(string $channelId): PublisherAPI
    {
        $channel = Channel::find($channelId);

        return new PublisherAPI($channel->key(), $channel->secret(), 'https://news-api.apple.com');
    }
}
