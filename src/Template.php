<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Template as Contract;
use ChapterThree\AppleNewsAPI\Document\AdvertisingSettings;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Styles\DocumentStyle;
use Statamic\Contracts\Entries\Entry;

abstract class Template implements Contract
{
    public function name(): string
    {
        if (isset($this->name)) {
            return $this->name;
        }

        return get_class($this);
    }

    public function entry(Entry $entry): self
    {
        $this->entry = $entry;

        return $this;
    }

    abstract public function title(): string;

    abstract public function subtitle(): ?string;

    abstract public function accessoryText(): ?string;

    abstract public function metadata(): Metadata;

    abstract public function layout(): Layout;

    abstract public function components(): array;

    abstract public function componentLayouts(): array;

    abstract public function componentStyles(): array;

    abstract public function componentTextStyles(): array;

    abstract public function textStyles(): array;

    abstract public function advertisingSettings(): AdvertisingSettings;

    // abstract public function documentStyle(): DocumentStyle;
}
