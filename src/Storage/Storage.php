<?php

namespace Aerni\AppleNews\Storage;

interface Storage
{
    public static function getArticle(string $collection, string $id): string;

    public static function putArticle(string $collection, string $id, string $article): void;

    public static function deleteArticle(string $collection, string $id): void;
}
