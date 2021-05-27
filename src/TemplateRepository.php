<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Contracts\TemplateRepository as Contract;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TemplateRepository implements Contract
{
    protected Collection $templates;

    public function __construct()
    {
        $this->templates = collect(config('apple-news')['templates'])->map(function ($template) {
            return resolve($template);
        });
    }

    public function all(): array
    {
        return $this->templates->toArray();
    }

    public function find(string $key): Template
    {
        return $this->templates->first(function ($template) use ($key) {
            return Str::snake($template->name) === $key;
        });
    }

    public function toNameArray(): array
    {
        return collect($this->templates)->mapWithKeys(function ($template) {
            return [Str::snake($template->name()) => $template->name()];
        })->toArray();
    }
}
