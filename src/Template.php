<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Template as Contract;
use ChapterThree\AppleNewsAPI\Document\AdvertisingSettings;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Styles\DocumentStyle;

abstract class Template implements Contract
{
    public function name(): string
    {
        if (isset($this->name)) {
            return $this->name;
        }

        return get_class($this);
    }

    // Method to prepare images

    abstract public function layout(): Layout;

    abstract public function components(): array;

    abstract public function componentLayouts(): array;

    abstract public function componentStyles(): array;

    abstract public function componentTextStyles(): array;

    abstract public function advertisingSettings(): AdvertisingSettings;

    abstract public function subtitle(): string;

    abstract public function metadata(): Metadata;

    abstract public function documentStyle(): DocumentStyle;

    abstract public function textStyles(): array;
}
