<?php

namespace Aerni\AppleNews\Actions;

use Aerni\AppleNews\Blueprints\AppleNewsBlueprint;
use Statamic\Fields\Blueprint;

class AppendBlueprintAction
{
    public static function execute(Blueprint $blueprint): void
    {
        $contents = $blueprint->contents();

        $appleNewsBlueprintFields = AppleNewsBlueprint::make()->contents()['sections']['main'];

        $contents['sections']['Apple News'] = $appleNewsBlueprintFields;

        $blueprint->setContents($contents);
    }
}
