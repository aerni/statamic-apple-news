<?php

namespace Aerni\AppleNews\Contracts;

interface TemplateRepository
{
    public function all(): array;

    public function find(string $key): Template;

    public function toNameArray(): array;
}
