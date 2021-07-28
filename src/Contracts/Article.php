<?php

namespace Aerni\AppleNews\Contracts;

interface Article
{
    /**
     * Create or update the article on Apple News.
     */
    public function publish(): bool;

    /**
     * Delete the article on Apple News and remove the data from the Statamic entry.
     */
    public function delete(): bool;

    /**
     * Get the article as json in the Apple News format.
     */
    public function json(): string;

    /**
     * Save the article as article.json for News Preview.
     */
    public function savePreview(): void;
}
