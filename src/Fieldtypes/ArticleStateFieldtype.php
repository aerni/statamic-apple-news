<?php

namespace Aerni\AppleNews\Fieldtypes;

use Aerni\AppleNews\Facades\Article;
use Illuminate\Support\Str;
use Statamic\Fields\Fieldtype;

class ArticleStateFieldtype extends Fieldtype
{
    protected $selectable = false;

    public function preload(): array
    {
        $entry = $this->field->parent();
        $state = Article::state($entry);

        return [
            'state' => Str::replace('_', ' ', Str::title($state)),
        ];
    }
}
