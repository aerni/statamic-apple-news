<?php

namespace Aerni\AppleNews\Contracts;

interface Storage
{
    public function get(string $collection, string $slug): string;

    public function put(string $collection, string $slug, string $json): void;

    public function delete(string $collection, string $slug): void;
}
