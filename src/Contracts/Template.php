<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;

interface Template
{
    public function name(): string;

    public function metadata(): Metadata;

    public function layout(): Layout;

    public function components(): array;

    public function componentTextStyles(): array;
}
