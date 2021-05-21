<?php

namespace Aerni\AppleNews\Listeners;

use Aerni\AppleNews\Actions\AppendBlueprintAction;
use Statamic\Events\EntryBlueprintFound;

class AppendBlueprintListener extends AppleNewsListener
{
    private $appendBlueprintAction;

    public function __construct(AppendBlueprintAction $appendBlueprintAction)
    {
        $this->appendBlueprintAction = $appendBlueprintAction;
    }

    public function handle(EntryBlueprintFound $event): void
    {
        if ($this->shouldAppendBlueprint($event->entry)) {
            $this->appendBlueprintAction->execute($event->blueprint);
        }
    }
}
