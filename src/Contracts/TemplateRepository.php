<?php

namespace Aerni\AppleNews\Contracts;

interface TemplateRepository
{
    /**
     * Get all the templates from the config.
     */
    public function all(): array;

    /**
     * Get a specific template from the config.
     */
    public function find(string $key): Template;

    /**
     * Get the names of all templates as array.
     */
    public function toNameArray(): array;
}
