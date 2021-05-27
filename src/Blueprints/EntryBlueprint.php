<?php

namespace Aerni\AppleNews\Blueprints;

use Statamic\Facades\Blueprint;
use Aerni\AppleNews\Facades\Template;
use Aerni\AppleNews\Contracts\AppleNewsBlueprint;
use Statamic\Fields\Blueprint as StatamicBlueprint;

class EntryBlueprint implements AppleNewsBlueprint
{
    public static function make(): StatamicBlueprint
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'main' => [
                    'fields' => [
                        [
                            'handle' => 'apple_news_section',
                            'field' => [
                                'type' => 'section',
                                'listable' => 'hidden',
                                'display' => 'Apple News',
                                'instructions' => 'Configure this article for Apple News',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_published',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Published',
                                'instructions' => 'Activate to publish on Apple News',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_template',
                            'field' => [
                                'type' => 'select',
                                'display' => 'Template',
                                'instructions' => 'Choose the Apple News template for this article',
                                'options' => Template::toNameArray(),
                                'default' => array_key_first(Template::toNameArray()),
                                'icon' => 'select',
                                'listable' => 'hidden',
                                'multiple' => false,
                                'clearable' => false,
                                'searchable' => false,
                                'taggable' => false,
                                'push_tags' => false,
                                'cast_booleans' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
