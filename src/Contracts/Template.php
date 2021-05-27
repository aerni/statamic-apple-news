<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;

interface Template
{
    public function name(): string;

    public function metadata(): Metadata;

    public function layout(): Layout;

    public function components(): array;

    public function componentTextStyles(): array;
}
