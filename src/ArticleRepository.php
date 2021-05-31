<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\ArticleRepository as Contract;
use Aerni\AppleNews\Facades\Api;
use Statamic\Contracts\Entries\Entry;

class ArticleRepository implements Contract
{
    public function make(Entry $entry): Article
    {
        return resolve(Article::class, ['entry' => $entry]);
    }

    public function publish(Entry $entry): bool
    {
        return $this->make($entry)->publish();
    }

    public function delete(Entry $entry): bool
    {
        return $this->make($entry)->delete();
    }

    public function state(Entry $entry): ?string
    {
        $id = $entry->get('apple_news_id');
        $state = $entry->get('apple_news_state');

        if (! $id) {
            return null;
        }

        if ($state !== 'LIVE') {
            return Api::article($id)->data->state;
        }

        return 'LIVE';
    }

    public function updateState(Entry $entry): void
    {
        $currentState = $entry->get('apple_news_state');
        $newState = $this->state($entry);

        if ($currentState !== $newState) {
            // TODO: Probably shouldn't save here as it will always save the entry on load which can lead to issues.
            $entry->set('apple_news_state', $newState)->save();
        }
    }
}
