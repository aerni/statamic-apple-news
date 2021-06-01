<?php

namespace Aerni\AppleNews;

use Aerni\AppleNews\Contracts\Article as Contract;
use Aerni\AppleNews\Contracts\Template;
use Aerni\AppleNews\Facades\Api;
use Aerni\AppleNews\Facades\Storage;
use Aerni\AppleNews\Facades\Template as TemplateRepository;
use ChapterThree\AppleNewsAPI\Document;
use Illuminate\Support\Facades\Cache;
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

    public function publish(): bool
    {
        // Prepare the data for the request
        $data = [
            'files' => [], // TODO: Support file attachments
            'metadata' => json_encode(['data' => $this->metadata()]),
            'json' => $this->json(),
        ];

        // Create or update the Apple News article.
        $response = $this->entry->has('apple_news_id')
            ? Api::updateArticle($this->entry->get('apple_news_id'), $data)
            : Api::createArticle($data);

        // Return if the response doesn't include any data.
        if (! isset($response->data)) {
            return false;
        }

        $this->updateEntry($response);

        return true;
    }

    public function delete(): bool
    {
        Api::deleteArticle($this->entry->get('apple_news_id'));

        $this->resetEntry();

        return true;
    }

    public function json(): string
    {
        return $this->document->json();
    }

    public function savePreview(): void
    {
        Storage::put('preview', 'article', $this->json());
    }

    private function metadata(): array
    {
        return [
            'revision' => $this->entry->get('apple_news_revision'),
            'isCandidateToBeFeatured' => $this->entry->get('apple_news_is_candidate_to_be_featured'),
            'isHidden' => $this->entry->get('apple_news_is_hidden'),
            'isPreview' => $this->entry->get('apple_news_is_preview'),
            'isSponsored' => $this->entry->get('apple_news_is_sponsored'),
            'maturityRating' => $this->entry->get('apple_news_maturity_rating'),
        ];
    }

    private function updateEntry(object $response): void
    {
        $this->entry->merge([
            'apple_news_is_preview' => $response->data->isPreview,
            'apple_news_is_hidden' => $response->data->isHidden,
            'apple_news_is_candidate_to_be_featured' => $response->data->isCandidateToBeFeatured,
            'apple_news_is_sponsored' => $response->data->isSponsored,
            'apple_news_maturity_rating' => $response->data->maturityRating,
            'apple_news_id' => $response->data->id,
            'apple_news_share_url' => $response->data->shareUrl,
            'apple_news_revision' => $response->data->revision,
        ]);

        Cache::put("apple_news_{$response->data->id}_state", $response->data->state);
    }

    private function resetEntry(): void
    {
        $this->entry->merge([
            'apple_news_id' => null,
            'apple_news_share_url' => null,
            'apple_news_revision' => null,
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
        return $this->entry->id();
    }

    private function title(): string
    {
        return $this->entry->get('title');
    }

    private function locale(): string
    {
        return $this->entry->site()->locale();
    }
}
