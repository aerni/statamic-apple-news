<?php

namespace Aerni\AppleNews;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{
    protected $commands = [
        Commands\MakeArticlePreview::class,
        Commands\MakeTemplate::class,
    ];

    protected $fieldtypes = [
        Fieldtypes\ArticleStateFieldtype::class,
    ];

    protected $listen = [
        'Statamic\Events\EntryBlueprintFound' => [
            'Aerni\AppleNews\Listeners\AppendEntryBlueprint',
        ],
        'Statamic\Events\EntryDeleted' => [
            'Aerni\AppleNews\Listeners\DeleteArticle',
        ],
        'Statamic\Events\EntrySaving' => [
            'Aerni\AppleNews\Listeners\PublishOrDeleteArticle',
        ],
    ];

    protected $scripts = [
        __DIR__.'/../resources/dist/js/apple-news.js',
    ];

    // protected $stylesheets = [
    //     __DIR__.'/../resources/dist/css/apple-news.css',
    // ];

    public function boot(): void
    {
        parent::boot();

        Statamic::booted(function () {
            $this->bindContracts();
        });
    }

    protected function bindContracts(): void
    {
        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Api::class,
            \Aerni\AppleNews\Api::class
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
            \Aerni\AppleNews\Contracts\Channel::class,
            \Aerni\AppleNews\Channel::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Storage::class,
            \Aerni\AppleNews\Storage::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Template::class,
            \Aerni\AppleNews\Template::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\TemplateRepository::class,
            \Aerni\AppleNews\TemplateRepository::class
        );
    }
}
