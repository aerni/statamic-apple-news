<?php

namespace App\AppleNews;

use Aerni\AppleNews\Template;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Styles\TextStyle;
use ChapterThree\AppleNewsAPI\Document\AdvertisingSettings;
use ChapterThree\AppleNewsAPI\Document\Components\Heading;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentStyle;
use ChapterThree\AppleNewsAPI\Document\Layouts\ComponentLayout;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle;

class DummyTemplate extends Template
{
    /**
     * The name you see in the template dropdown in the Statamic CP.
     */
    public string $name = 'DummyTemplate';

    /**
     * Set the layout for this template.
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
            new Heading($this->entry->get('title')),
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

    /**
     * Set the subtitle of the article.
     */
    public function subtitle(): string
    {
        return '';
    }

    /**
     * Set the metadata of the article.
     */
    public function metadata(): Metadata
    {
        return (new Metadata)
            ->addAuthor('Michael Aerni');
    }

    /**
     * Set the advertising settings of the article.
     */
    public function advertisingSettings(): AdvertisingSettings
    {
        return (new AdvertisingSettings());
    }
}
