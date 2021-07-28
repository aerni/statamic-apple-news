<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Contracts\Entries\Entry;
use Statamic\Fields\Blueprint as StatamicBlueprint;

interface Blueprint
{
    /**
     * Get a Statamic blueprint populated with fields.
     */
    public static function make(Entry $entry): StatamicBlueprint;
}
