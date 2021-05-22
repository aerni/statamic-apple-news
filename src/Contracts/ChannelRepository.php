<?php

namespace Aerni\AppleNews\Contracts;

use Illuminate\Support\Collection;

interface ChannelRepository
{
    /**
     * Get all the channels.
     */
    public function all(): Collection;

    /**
     * Get a channel by its ID.
     */
    public function find(string $id): ?Channel;

    /**
     * Get a channel by its handle.
     */
    public function findByHandle(string $handle): ?Channel;

    /**
     * Get a channel by its collection.
     */
    public function findByCollection(string $handle): ?Channel;
}
