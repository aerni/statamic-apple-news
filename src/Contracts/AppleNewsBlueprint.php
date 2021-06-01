<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Fields\Blueprint;
use Statamic\Contracts\Entries\Entry;

interface AppleNewsBlueprint
{
    /**
     * Get a Statamic blueprint populated with fields.
     */
    public static function make(Entry $entry): Blueprint;
}
