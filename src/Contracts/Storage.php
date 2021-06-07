<?php

namespace Aerni\AppleNews\Contracts;

interface Storage
{
    /**
     * Get a file from the storage.
     */
    public function get(string $collection, string $slug): string;

    /**
     * Save a file to the storage.
     */
    public function put(string $collection, string $slug, string $json): void;

    /**
     * Delete a file from the storage.
     */
    public function delete(string $collection, string $slug): void;
}
