<?php

namespace Aerni\AppleNews\Blueprints;

use Aerni\AppleNews\Contracts\Blueprint as Contract;
use Statamic\Facades\Blueprint;
use Statamic\Fields\Blueprint as BlueprintFields;

class AppleNewsBlueprint implements Contract
{
    public static function make(): BlueprintFields
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
                            'handle' => 'published_on_apple_news',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Published',
                                'instructions' => 'Activate to publish on Apple News',
                                'localizable' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
