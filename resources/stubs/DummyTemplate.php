<?php

namespace App\AppleNews;

use Aerni\AppleNews\Template;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Components\Body;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle;

class DummyTemplate extends Template
{
    public string $name = 'DummyTemplate';

    public function metadata(): Metadata
    {
        return (new Metadata)
            ->addAuthor('');
    }

    public function layout(): Layout
    {
        return new Layout(7, 1024);
    }

    public function components(): array
    {
        return [
            new Body(''),
        ];
    }

    public function componentTextStyles(): array
    {
        return [
            'default' => new ComponentTextStyle(),
        ];
    }
}
