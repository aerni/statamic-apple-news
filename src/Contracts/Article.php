<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use Statamic\Contracts\Entries\Entry;

interface Article
{
    public function from(Entry $entry): self;

    public function id(): string;

    public function title(): string;

    public function locale(): string;

    public function collection(): string;

    public function layout(): Layout;

    public function components(): array;

    public function componentTextStyles(): array;

    public function article(): Document;

    public function publish(): self;

    public function unpublish(): self;

    public function saveToFile(): self;

    public function deleteFile(): self;

    public function published(): bool;
}
