<?php

namespace Aerni\AppleNews;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $listen = [
        'Statamic\Events\EntryDeleted' => [
            'Aerni\AppleNews\Listeners\DeleteArticleListener',
        ],
        'Statamic\Events\EntrySaved' => [
            'Aerni\AppleNews\Listeners\CreateArticleListener',
            'Aerni\AppleNews\Listeners\PublishArticleListener',
            'Aerni\AppleNews\Listeners\UnpublishArticleListener',
        ],
    ];
}
