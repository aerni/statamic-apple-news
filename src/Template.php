<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Template as Contract;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;

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

    abstract public function metadata(): Metadata;

    abstract public function layout(): Layout;

    abstract public function components(): array;

    abstract public function componentTextStyles(): array;
}
