<?php

namespace Aerni\AppleNews;

use Statamic\Statamic;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $listen = [
        'Statamic\Events\EntryBlueprintFound' => [
            'Aerni\AppleNews\Listeners\AppendBlueprintListener',
        ],
        'Statamic\Events\EntryDeleted' => [
            'Aerni\AppleNews\Listeners\DeleteArticleListener',
        ],
        'Statamic\Events\EntrySaving' => [
            'Aerni\AppleNews\Listeners\CreateArticleListener',
            'Aerni\AppleNews\Listeners\PublishArticleListener',
            'Aerni\AppleNews\Listeners\UnpublishArticleListener',
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
            \Aerni\AppleNews\Contracts\ChannelRepository::class,
            \Aerni\AppleNews\ChannelRepository::class
        );

        $this->app->singleton(
            \Aerni\AppleNews\Contracts\Channel::class,
            \Aerni\AppleNews\Channel::class
        );

        return $this;
    }
}
