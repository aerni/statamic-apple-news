<?php

namespace Aerni\AppleNews\Contracts;

interface Article
{
    /**
     * Publish the article on Apple News and update the entry.
     */
    public function publish(): bool;

    /**
     * Deletes an article on Apple News and resets the entry.
     */
    public function delete(): bool;

    /**
     * Get the article as json in the Apple News format.
     */
    public function json(): string;

    /**
     * Save the article as JSON to file.
     */
    public function saveJson(): bool;
}
