<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document;
use Statamic\Contracts\Entries\Entry;

interface Channel
{
    /**
     * Get the channel handle.
     */
    public function handle(): string;

    /**
     * Get the channel ID.
     */
    public function id(): string;

    /**
     * Get the channel API key.
     */
    public function key(): string;

    /**
     * Get the channel API secret.
     */
    public function secret(): string;

    /**
     * Determines whether a given entry should be included in the News channel.
     */
    public function matchEntry(Entry $entry): bool;

    /**
     * Determines whether a given entry should be published to Apple News in its current state.
     */
    public function canPublish(Entry $entry): bool;

    /**
     * Creates an article for the given entry.
     */
    public function createArticle(Entry $entry, string $template): Document;

    /**
     * Get an array of article templates for this channel.
     */
    public function templates(): array;
}
