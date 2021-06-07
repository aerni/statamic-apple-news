<?php

namespace App\AppleNews;

use Aerni\AppleNews\Template;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Styles\TextStyle;
use ChapterThree\AppleNewsAPI\Document\Components\Heading;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentStyle;
use ChapterThree\AppleNewsAPI\Document\Layouts\ComponentLayout;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle;

class DummyTemplate extends Template
{
    /**
     * The template name that shows in the template dropdown in the Statamic CP.
     */
    public string $name = 'DummyTemplate';

    /**
     * Sets the article title.
     */
    public function title(): string
    {
        return $this->entry->get('title');
    }

    /**
     * Sets an optional article subtitle.
     */
    public function subtitle(): ?string
    {
        return null;
    }

    /**
     * Sets an optional text that appears below the excerpt in your article tile.
     */
    public function accessoryText(): ?string
    {
        return null;
    }

    /**
     * Sets the article metadata.
     */
    public function metadata(): Metadata
    {
        return (new Metadata)
            ->addAuthor('Michael Aerni');
    }

    /**
     * Sets the article layout.
     */
    public function layout(): Layout
    {
        return (new Layout(7, 1024))
            ->setMargin(60)
            ->setGutter(20);
    }

    /**
     * An array of article components.
     * Check out the \ChapterThree\AppleNewsAPI\Document\Components namespace for all available components.
     */
    public function components(): array
    {
        return [
            new Heading($this->title()),
        ];
    }

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Layouts\ComponentLayout.
     * The key is the layout's name.
     */
    public function componentLayouts(): array
    {
        return [
            'default' => new ComponentLayout(),
        ];
    }

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\ComponentStyle.
     * The key is the styles's name.
     */
    public function componentStyles(): array
    {
        return [
            'default' => new ComponentStyle(),
        ];
    }

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle.
     * The key is the styles's name.
     */
    public function componentTextStyles(): array
    {
        return [
            'default' => new ComponentTextStyle(),
        ];
    }

    /**
     * An array of \ChapterThree\AppleNewsAPI\Document\Styles\TextStyle.
     * The key is the styles's name.
     */
    public function textStyles(): array
    {
        return [
            'default' => new TextStyle(),
        ];
    }
}
