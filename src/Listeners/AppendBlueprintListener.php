<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\AppendBlueprintAction;
use Statamic\Events\EntryBlueprintFound;

class AppendBlueprintListener extends AppleNewsListener
{
    public function handle(EntryBlueprintFound $event): void
    {
        if ($this->shouldAppendBlueprint($event->entry)) {
            AppendBlueprintAction::execute($event->blueprint);
        }
    }
}
