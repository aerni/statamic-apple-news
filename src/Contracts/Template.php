<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use Statamic\Contracts\Entries\Entry;

interface Template
{
    /**
     * Returns the name of the template.
     */
    public function name(): string;

    /**
     * Sets the entry of the template.
     */
    public function entry(Entry $entry): self;

    /**
     * Sets the article title.
     */
    public function title(): string;

    /**
     * Sets an optional article subtitle.
     */
    public function subtitle(): ?string;

    /**
     * Sets an optional text that appears below the excerpt in your article tile.
     */
    public function accessoryText(): ?string;

    /**
     * Sets the article metadata.
     */
    public function metadata(): Metadata;

    /**
     * Sets the article layout.
     */
    public function layout(): Layout;

    /**
     * An array of article components.
     * Check out the \ChapterThree\AppleNewsAPI\Document\Components namespace for all available components.
     */
    public function components(): array;

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Layouts\ComponentLayout.
     * The key is the layout's name.
     */
    public function componentLayouts(): array;

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\ComponentStyle.
     * The key is the styles's name.
     */
    public function componentStyles(): array;

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle.
     * The key is the styles's name.
     */
    public function componentTextStyles(): array;

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\TextStyle.
     * The key is the styles's name.
     */
    public function textStyles(): array;
}
