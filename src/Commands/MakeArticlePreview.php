<?php

namespace Aerni\AppleNews\Commands;

use Aerni\AppleNews\Facades\Article;
use Illuminate\Console\Command;
use Statamic\Console\RunsInPlease;
use Statamic\Facades\Entry;

class MakeArticlePreview extends Command
{
    use RunsInPlease;

    protected $signature = 'apple-news:preview {entryId}';
    protected $description = 'Create an article.json file for News Preview';

    public function handle()
    {
        $entry = Entry::find($this->argument('entryId'));

        Article::make($entry)->savePreview();

        $path = storage_path("statamic/addons/apple-news/preview/article.json");
        $relativePath = str_replace(base_path() . '/', '', $path);

        $this->line("<info>[✓]</info> The article preview has been successfully created: <comment>{$relativePath}</comment>");
    }
}
