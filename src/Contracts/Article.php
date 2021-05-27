<?php

namespace Aerni\AppleNews\Contracts;

interface Article
{
    /**
     * Get the article as json in the Apple News format.
     */
    public function json(): string;

    /**
     * Publish the article on Apple News and update the entry record.
     */
    public function publish(): bool;

    /**
     * Deletes an article on Apple News and its record on the Statamic entry.
     */
    public function delete(): bool;
}
