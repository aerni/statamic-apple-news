<?php

namespace Aerni\AppleNews;

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
}
