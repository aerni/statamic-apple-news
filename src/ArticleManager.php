<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Facades\Api;
use Illuminate\Support\Collection;
use Aerni\AppleNews\Facades\Channel;
use Aerni\AppleNews\Facades\Storage;
use Statamic\Contracts\Entries\Entry;
use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Facades\ArticleRecord;
use Aerni\AppleNews\Contracts\ArticleManager as Contract;

class ArticleManager implements Contract
{
    const STATE_PROCESSING = 'PROCESSING';
    const STATE_PROCESSING_UPDATE = 'PROCESSING_UPDATE';
    const STATE_QUEUED = 'QUEUED';
    const STATE_QUEUED_UPDATE = 'QUEUED_UPDATE';
    const STATE_LIVE = 'LIVE';
    const STATE_FAILED_PROCESSING = 'FAILED_PROCESSING';
    const STATE_FAILED_PROCESSING_UPDATE = 'FAILED_PROCESSING_UPDATE';
    const STATE_TAKEN_DOWN = 'TAKEN_DOWN';

    /**
     * Returns all known info about an entry's articles on Apple News.
     *
     * @param Entry $entry The entry
     * @param string $channelId The channel ID
     * @param bool $refresh Whether the info should be refreshed for articles that are processing
     * @return array[] The info, indexed by channel ID
     */
    public function getArticleInfo(Entry $entry, string $channelId, bool $refresh = false): array
    {
        $record = ArticleRecord::get($entry);

        // Refresh first?
        if ($refresh && in_array($record->get('state'), [self::STATE_PROCESSING, self::STATE_PROCESSING_UPDATE], true)) {
            $response = Api::article($record->get('channel_id'), $record->get('article_id'));

            if (isset($response->data)) {
                $this->updateArticleRecord($entry, $response, $channelId);
            }
        }

        return $infos[$record->get('channel_id')] = ArticleRecord::get($entry)->toArray();
    }

    /**
     * Publish an article to the given Apple News channel.
     */
    public function publish(Entry $entry, string $channelId): bool
    {
        if (! $this->publishableTo($entry, $channelId)) {
            return false;
        }

        $articleRecord = ArticleRecord::get($entry);

        $article = Channel::find($channelId)->createArticle($entry);

        // Add the latest revision ID if we have one.
        if ($articleRecord->has('revision_id')) {
            $metadata['revision'] = $articleRecord->get('revision_id');
        }

        // Prepare the data and send the request.
        $data = [
            'files' => [], // TODO: Support file attachments
            'metadata' => ! empty($metadata) ? json_encode(['data' => $metadata]) : null,
            'json' => $article->json()
        ];

        // Create or update the Apple News article.
        $response = $articleRecord->has('article_id')
            ? Api::updateArticle($channelId, $articleRecord->get('article_id'), $data)
            : Api::createArticle($channelId, $data);

        // Update the article record on the Statamic entry.
        if (isset($response->data)) {
            $this->updateArticleRecord($entry, $response, $channelId);
        }

        return true;
    }

    /**
     * Deletes an article on Apple News and its record on the Statamic entry.
     */
    public function delete(Entry $entry): bool
    {
        $articleRecord = ArticleRecord::get($entry);

        $channelId = $articleRecord->get('channel_id');
        $articleId = $articleRecord->get('article_id');

        Api::deleteArticle($channelId, $articleId);
        ArticleRecord::delete($entry);

        return true;
    }

    /**
     * Updates the article record of a given entry with the data of the Apple News API response.
     */
    protected function updateArticleRecord(Entry $entry, object $response, string $channelId)
    {
        ArticleRecord::update($entry, [
            'channel_id' => $channelId,
            'article_id' => $response->data->id,
            'revision_id' => $response->data->revision,
            'is_sponsored' => $response->data->isSponsored,
            'is_preview' => $response->data->isPreview,
            'state' => $response->data->state,
            'share_url' => $response->data->shareUrl,
        ]);
    }

    public function saveToFile(Article $article): self
    {
        Storage::put($article->collection(), $article->id(), $article->article());

        return $this;
    }

    public function deleteFile(Article $article): self
    {
        Storage::delete($article->collection(), $article->id());

        return $this;
    }

    /**
     * Get all the Apple News channels the given entry can be published to.
     */
    public function publishableChannels(Entry $entry): Collection
    {
        return Channel::all()->filter(function ($channel) use ($entry) {
            return $channel->matchEntry($entry) && $channel->canPublish($entry);
        });
    }

    /**
     * Determines whether the given entry can be published on any Apple News channel.
     */
    public function publishable(Entry $entry): bool
    {
        return $this->publishableChannels($entry)->isNotEmpty();
    }

    /**
     * Determines whether the given entry can be published to the given Apple News channel.
     */
    public function publishableTo(Entry $entry, string $channelId): bool
    {
        return $this->publishableChannels($entry)->filter(function ($channel) use ($channelId) {
            return $channel->id() === $channelId;
        })->isNotEmpty();
    }
}
