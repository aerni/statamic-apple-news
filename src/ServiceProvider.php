<?php

namespace Aerni\AppleNews;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{
    protected $listen = [
        'Statamic\Events\EntryBlueprintFound' => [
            'Aerni\AppleNews\Listeners\AppendEntryBlueprint',
            'Aerni\AppleNews\Listeners\UpdateArticleStatus',
        ],
        'Statamic\Events\EntryDeleted' => [
            'Aerni\AppleNews\Listeners\DeleteArticle',
        ],
        'Statamic\Events\EntrySaving' => [
            'Aerni\AppleNews\Listeners\PublishOrDeleteArticle',
        ],
    ];

    public function boot()
    {
        parent::boot();

        Statamic::booted(function () {
            $this->bindContracts();
        });
    }

    protected function bindContracts()
    {
        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Channel::class,
            \Aerni\AppleNews\Channel::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Article::class,
            \Aerni\AppleNews\Article::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\ArticleRepository::class,
            \Aerni\AppleNews\ArticleRepository::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\ArticleManager::class,
            \Aerni\AppleNews\ArticleManager::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\ArticleRecord::class,
            \Aerni\AppleNews\ArticleRecord::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Storage::class,
            \Aerni\AppleNews\Storage::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Api::class,
            \Aerni\AppleNews\Api::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Template::class,
            \Aerni\AppleNews\Template::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\TemplateRepository::class,
            \Aerni\AppleNews\TemplateRepository::class
        );

        return $this;
    }
}
