<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use Statamic\Contracts\Entries\Entry;

interface Template
{
    public function name(): string;

    public function entry(Entry $entry): self;

    public function title(): string;

    public function subtitle(): ?string;

    public function accessoryText(): ?string;

    public function metadata(): Metadata;

    public function layout(): Layout;

    public function components(): array;

    public function componentLayouts(): array;

    public function componentStyles(): array;

    public function componentTextStyles(): array;

    public function textStyles(): array;
}
