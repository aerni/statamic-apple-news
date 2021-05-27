<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article as Contract;
use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Facades\Api;
use Aerni\AppleNews\Facades\ArticleRecord;
use Aerni\AppleNews\Facades\Storage;
use ChapterThree\AppleNewsAPI\Document;
use Statamic\Contracts\Entries\Entry;
use Statamic\Facades\Addon;
use Statamic\Statamic;

class Article implements Contract
{
    protected Entry $entry;
    protected Template $template;
    protected Document $document;


    public function __construct(Entry $entry, Template $template)
    {
        $this->entry = $entry;
        $this->template = $template;
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
        $articleRecord = ArticleRecord::get($this->entry);

        // Add the latest revision ID if we have one.
        if ($articleRecord->has('revision_id')) {
            $metadata['revision'] = $articleRecord->get('revision_id');
        }

        // Prepare the data and send the request.
        $data = [
            'files' => [], // TODO: Support file attachments
            'metadata' => ! empty($metadata) ? json_encode(['data' => $metadata]) : null,
            'json' => $this->json(),
        ];

        // Create or update the Apple News article.
        $response = $articleRecord->has('article_id')
            ? Api::updateArticle($articleRecord->get('article_id'), $data)
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
        $articleRecord = ArticleRecord::get($this->entry);

        $articleId = $articleRecord->get('article_id');

        Api::deleteArticle($articleId);
        ArticleRecord::delete($this->entry);

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
    private function updateArticleRecord(object $response): void
    {
        ArticleRecord::update($this->entry, [
            'article_id' => $response->data->id,
            'revision_id' => $response->data->revision,
            'is_sponsored' => $response->data->isSponsored,
            'is_preview' => $response->data->isPreview,
            'state' => $response->data->state,
            'share_url' => $response->data->shareUrl,
        ]);
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
