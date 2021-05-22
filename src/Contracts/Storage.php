<?php

namespace Aerni\AppleNews\Contracts;

interface Storage
{
    public function get(string $collection, string $id): string;

    public function put(string $collection, string $id, string $article): void;

    public function delete(string $collection, string $id): void;
}
