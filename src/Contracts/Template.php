<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\AdvertisingSettings;
use ChapterThree\AppleNewsAPI\Document\Styles\DocumentStyle;

interface Template
{
    public function name(): string;

    public function layout(): Layout;

    public function components(): array;

    public function componentLayouts(): array;

    public function componentStyles(): array;

    public function componentTextStyles(): array;

    public function advertisingSettings(): AdvertisingSettings;

    public function subtitle(): string;

    public function metadata(): Metadata;

    public function documentStyle(): DocumentStyle;

    public function textStyles(): array;
}
