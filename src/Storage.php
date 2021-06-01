<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Storage as Contract;
use Statamic\Facades\File;

class Storage implements Contract
{
    public function get(string $collection, string $slug): string
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$slug}.json");

        return File::get($path);
    }

    public function put(string $collection, string $slug, string $json): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$slug}.json");

        File::put($path, $json);
    }

    public function delete(string $collection, string $slug): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$slug}.json");

        File::delete($path);
    }
}
