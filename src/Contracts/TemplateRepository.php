<?php

namespace Aerni\AppleNews\Contracts;

use Aerni\AppleNews\Contracts\Template;

interface TemplateRepository
{
    public function all(): array;

    public function find(string $key): Template;

    public function toNameArray(): array;
}
