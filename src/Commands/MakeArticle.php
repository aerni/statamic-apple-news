<?php

namespace Aerni\AppleNews\Commands;

use Aerni\AppleNews\Facades\Article;
use Statamic\Facades\Entry;
use Illuminate\Console\Command;
use Statamic\Console\RunsInPlease;

class MakeArticle extends Command
{
    use RunsInPlease;

    protected $signature = 'apple-news:json {entryId}';
    protected $description = 'Create an article of an entry and save it as JSON';

    public function handle()
    {
        $entry = Entry::find($this->argument('entryId'));

        Article::make($entry)->saveJson();

        $path = storage_path("statamic/addons/apple-news/{$entry->collectionHandle()}/{$entry->slug()}.json");
        $relativePath = str_replace(base_path() . '/', '', $path);

        $this->line("<info>[✓]</info> The article has been successfully created: <comment>{$relativePath}</comment>");
    }
}
