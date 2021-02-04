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
        'Statamic\Events\EntrySaved' => [
            'Aerni\AppleNews\Listeners\CreateAndPublishArticleListener',
            'Aerni\AppleNews\Listeners\UnpublishArticleListener',
        ],
    ];
}
