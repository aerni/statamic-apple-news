<?php

namespace Aerni\AppleNews\Storage;

use Statamic\Facades\File;

class AppleNewsStorage implements Storage
{
    public static function getArticle(string $collection, string $id): string
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        return File::get($path);
    }

    public static function putArticle(string $collection, string $id, string $article): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        File::put($path, $article);
    }

    public static function deleteArticle(string $collection, string $id): void
    {
        $path = storage_path("statamic/addons/apple-news/{$collection}/{$id}.json");

        File::delete($path);
    }
}
