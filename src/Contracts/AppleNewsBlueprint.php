<?php

namespace Aerni\AppleNews\Contracts;

use Statamic\Fields\Blueprint;

interface AppleNewsBlueprint
{
    /**
     * Get a Statamic blueprint populated with fields.
     */
    public static function make(): Blueprint;
}
