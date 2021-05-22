<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article as Contract;
use Aerni\AppleNews\Facades\Storage;
use ChapterThree\AppleNewsAPI\Document;
use ChapterThree\AppleNewsAPI\Document\Components\Body;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle;
use Statamic\Contracts\Entries\Entry;

class Article implements Contract
{
    protected Entry $entry;

    public function from(Entry $entry): self
    {
        $this->entry = $entry;

        return $this;
    }

    public function id(): string
    {
        return $this->entry->slug();
    }

    public function title(): string
    {
        return $this->entry->get('title');
    }

    public function locale(): string
    {
        return $this->entry->site()->shortLocale();
    }

    public function collection(): string
    {
        return $this->entry->collectionHandle();
    }

    public function layout(): Layout
    {
        return new Layout(7, 1024);
    }

    public function components(): array
    {
        return [
            new Body('body text'),
        ];
    }

    public function componentTextStyles(): array
    {
        return [
            'default' => new ComponentTextStyle(),
        ];
    }

    public function article(): Document
    {
        $article = new Document($this->id(), $this->title(), $this->locale(), $this->layout());

        foreach ($this->components() as $component) {
            $article->addComponent($component);
        }

        foreach ($this->componentTextStyles() as $name => $component) {
            $article->addComponentTextStyle($name, $component);
        }

        return $article;
    }

    public function publish(): self
    {
        //

        return $this;
    }

    public function unpublish(): self
    {
        //

        return $this;
    }

    public function saveToFile(): self
    {
        Storage::put($this->collection(), $this->id(), $this->article());

        return $this;
    }

    public function deleteFile(): self
    {
        Storage::delete($this->collection(), $this->id());

        return $this;
    }

    public function published(): bool
    {
        // TODO: Make a request to the API to check if the entry exists

        if (! $this->entry->published()) {
            return false;
        }

        if (! $this->entry->get('published_on_apple_news')) {
            return false;
        }

        return true;
    }
}
