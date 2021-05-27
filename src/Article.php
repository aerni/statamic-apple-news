<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article as Contract;
use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Facades\Api;
use Aerni\AppleNews\Facades\Storage;
use Aerni\AppleNews\Facades\Template as TemplateRepository;
use ChapterThree\AppleNewsAPI\Document;
use Statamic\Contracts\Entries\Entry;
use Statamic\Facades\Addon;
use Statamic\Statamic;

class Article implements Contract
{
    protected Entry $entry;
    protected Template $template;
    protected Document $document;


    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
        $this->template = $this->template();
        $this->document = $this->document();
    }

    /**
     * Get the article as json in the Apple News format.
     */
    public function json(): string
    {
        return $this->document->json();
    }

    /**
     * Publish the article on Apple News and update the entry record.
     */
    public function publish(): bool
    {
        // Add the latest revision ID if we have one.
        if ($revision = $this->entry->get('apple_news_revision_id')) {
            $metadata['revision'] = $revision;
        }

        // Prepare the data and send the request.
        $data = [
            'files' => [], // TODO: Support file attachments
            'metadata' => ! empty($metadata) ? json_encode(['data' => $metadata]) : null,
            'json' => $this->json(),
        ];

        // Create or update the Apple News article.
        $response = $this->entry->has('apple_news_article_id')
            ? Api::updateArticle($this->entry->get('apple_news_article_id'), $data)
            : Api::createArticle($data);

        // Update the article record on the Statamic entry.
        if (isset($response->data)) {
            $this->updateArticleRecord($response);

            return true;
        }

        return false;
    }

    /**
     * Deletes an article on Apple News and its record on the Statamic entry.
     */
    public function delete(): bool
    {
        Api::deleteArticle($this->entry->get('apple_news_article_id'));

        $this->updateArticleRecord();

        return true;
    }

    public function saveFile(): bool
    {
        Storage::put($this->entry->collectionHandle(), $this->id(), $this->json());

        return true;
    }

    public function deleteFile(): bool
    {
        Storage::delete($this->entry->collectionHandle(), $this->id());

        return true;
    }

    /**
     * Updates the article record of a given entry with the data of the Apple News API response.
     */
    private function updateArticleRecord(object $response = null): void
    {
        $this->entry->merge([
            'apple_news_article_id' => $response->data->id ?? null,
            'apple_news_revision_id' => $response->data->revision ?? null,
            'apple_news_is_sponsored' => $response->data->isSponsored ?? null,
            'apple_news_is_preview' => $response->data->isPreview ?? null,
            'apple_news_state' => $response->data->state ?? null,
            'apple_news_share_url' => $response->data->shareUrl ?? null,
        ]);
    }

    private function template(): Template
    {
        return TemplateRepository::find($this->entry->get('apple_news_template'));
    }

    private function document(): Document
    {
        $this->document = new Document($this->id(), $this->title(), $this->locale(), $this->template->layout());

        $this->addMetadata();
        $this->addComponents();
        $this->addComponentTextStyles();

        return $this->document;
    }

    private function addMetadata(): void
    {
        $addon = Addon::get('aerni/apple-news');

        $metadata = $this->template->metadata()
            ->setGeneratorName('Statamic')
            ->setGeneratorVersion(Statamic::version() . " ({$addon->name()} {$addon->version()})");

        $this->document->setMetadata($metadata);
    }

    private function addComponents(): void
    {
        foreach ($this->template->components() as $component) {
            $this->document->addComponent($component);
        }
    }

    private function addComponentTextStyles(): void
    {
        foreach ($this->template->componentTextStyles() as $name => $component) {
            $this->document->addComponentTextStyle($name, $component);
        }
    }

    private function id(): string
    {
        return $this->entry->slug();
    }

    private function title(): string
    {
        return $this->entry->get('title');
    }

    private function locale(): string
    {
        return $this->entry->site()->shortLocale();
    }
}
