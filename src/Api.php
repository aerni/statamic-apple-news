<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Api as Contract;
use Aerni\AppleNews\Facades\Channel;
use ChapterThree\AppleNewsAPI\PublisherAPI;
use stdClass;

class Api implements Contract
{
    public function channel(): stdClass
    {
        return $this->get('/channels/{channel_id}', [
            'channel_id' => Channel::id(),
        ]);
    }

    public function sections(): stdClass
    {
        return $this->get('/channels/{channel_id}/sections', [
            'channel_id' => Channel::id(),
        ]);
    }

    public function section(string $id): stdClass
    {
        return $this->get('/sections/{section_id}', [
            'section_id' => $id,
        ]);
    }

    public function article(string $id): stdClass
    {
        return $this->get('/articles/{article_id}', ['article_id' => $id]);
    }

    public function search(array $params = []): stdClass
    {
        return $this->get('/channels/{channel_id}/articles', [
            'channel_id' => Channel::id(),
        ], $params);
    }

    public function createArticle(array $data): stdClass
    {
        return $this->post('/channels/{channel_id}/articles', [
            'channel_id' => Channel::id(),
        ], $data);
    }

    public function updateArticle(string $id, array $data): stdClass
    {
        return $this->post('/articles/{article_id}', [
            'article_id' => $id,
        ], $data);
    }

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
