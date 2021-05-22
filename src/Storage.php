<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Storage as Contract;
use Statamic\Facades\File;

class Storage implements Contract
{
    public function get(string $collection, string $id): string
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        return File::get($path);
    }

    public function put(string $collection, string $id, string $article): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        File::put($path, $article);
    }

    public function delete(string $collection, string $id): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        File::delete($path);
    }
}
