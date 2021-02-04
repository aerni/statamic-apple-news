<?php

namespace Aerni\AppleNews\Actions;

use Aerni\AppleNews\Blueprints\AppleNewsBlueprint;
use Statamic\Fields\Blueprint;

class AppendBlueprintAction
{
    public function execute(Blueprint $blueprint): void
    {
        $contents = $blueprint->contents();

        $appleNewsBlueprint = AppleNewsBlueprint::make();
        $appleNewsBlueprintFields = $appleNewsBlueprint->contents()['sections']['main'];

        $contents['sections']['Apple News'] = $appleNewsBlueprintFields;

        $blueprint->setContents($contents);
    }
}
