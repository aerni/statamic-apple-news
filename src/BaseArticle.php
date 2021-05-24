<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article;
use ChapterThree\AppleNewsAPI\Document;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Metadata;
use Statamic\Contracts\Entries\Entry;
use Statamic\Facades\Addon;
use Statamic\Statamic;

abstract class BaseArticle implements Article
{
    protected Entry $entry;
    protected Document $article;

    public function from(Entry $entry): Document
    {
        $this->entry = $entry;

        return $this->article();
    }

    private function article(): Document
    {
        $this->article = new Document($this->id(), $this->title(), $this->locale(), $this->layout());

        $this->addMetadata();
        $this->addComponents();
        $this->addComponentTextStyles();

        return $this->article;
    }

    private function addMetadata(): void
    {
        $addon = Addon::get('aerni/apple-news');

        $metadata = $this->metadata()
            ->setGeneratorName('Statamic')
            ->setGeneratorVersion(Statamic::version() . " ({$addon->name()} {$addon->version()})");

        $this->article->setMetadata($metadata);
    }

    private function addComponents(): void
    {
        foreach ($this->components() as $component) {
            $this->article->addComponent($component);
        }
    }

    private function addComponentTextStyles(): void
    {
        foreach ($this->componentTextStyles() as $name => $component) {
            $this->article->addComponentTextStyle($name, $component);
        }
    }

    protected function id(): string
    {
        return $this->entry->slug();
    }

    protected function title(): string
    {
        return $this->entry->get('title');
    }

    protected function locale(): string
    {
        return $this->entry->site()->shortLocale();
    }

    abstract protected function metadata(): Metadata;

    abstract protected function layout(): Layout;

    abstract protected function components(): array;

    abstract protected function componentTextStyles(): array;
}
