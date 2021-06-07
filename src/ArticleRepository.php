<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use Aerni\AppleNews\Contracts\ArticleRepository as Contract;
use Aerni\AppleNews\Facades\Api;
use Illuminate\Support\Facades\Cache;
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

    public function state(Entry $entry): string
    {
        $id = $entry->get('apple_news_id');

        if (is_null($id)) {
            return 'Unpublished';
        }

        $state = Cache::get("apple_news_{$id}_state");

        if (is_null($state) || $state !== 'LIVE') {
            // Get the state from the API and save it for 60 seconds in a temp key.
            $state = Cache::remember("apple_news_{$id}_state_temp", 60, function () use ($id) {
                return Api::article($id)->data->state;
            });

            // Persist the temp value to the article state if the state is 'LIVE'.
            if ($state === 'LIVE') {
                Cache::put("apple_news_{$id}_state", $state);
            }
        }

        return $state;
    }
}
