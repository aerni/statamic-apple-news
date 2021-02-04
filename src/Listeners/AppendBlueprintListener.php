<?php

namespace Aerni\AppleNews\Listeners;

use Statamic\Events\EntryBlueprintFound;
use Aerni\AppleNews\Actions\AppendBlueprintAction;

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
