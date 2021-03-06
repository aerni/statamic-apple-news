<?php

namespace Aerni\AppleNews\Contracts;

interface Channel
{
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
     * Get the site used to publish.
     */
    public function site(): string;

    /**
     * Get the publishable collections.
     */
    public function collections(): array;

    /**
     * Get the article templates of this channel.
     */
    public function templates(): array;
}
