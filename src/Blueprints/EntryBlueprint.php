<?php

namespace Aerni\AppleNews\Blueprints;

use Aerni\AppleNews\Contracts\AppleNewsBlueprint;
use Aerni\AppleNews\Facades\Template;
use Statamic\Facades\Blueprint;
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
                                'display' => 'Apple News',
                                'instructions' => 'Configure the publishing options for this entry.',
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_published',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Published',
                                'instructions' => 'Activate to publish on Apple News.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_template',
                            'field' => [
                                'type' => 'select',
                                'display' => 'Template',
                                'instructions' => 'Choose the template for this article.',
                                'options' => Template::toNameArray(),
                                'default' => array_key_first(Template::toNameArray()),
                                'icon' => 'select',
                                'listable' => 'hidden',
                                'multiple' => false,
                                'clearable' => false,
                                'searchable' => true,
                                'taggable' => false,
                                'push_tags' => false,
                                'cast_booleans' => false,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_hidden',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Hidden',
                                'instructions' => 'Activate to hide this article from Apple News feeds.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_preview',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Preview',
                                'instructions' => 'Activate to make this article a preview that is only visible to members of your channel.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'default' => 'true',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_candidate_to_be_featured',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Featured',
                                'instructions' => 'Activate to consider this article for featuring in Apple News.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_sponsored',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Sponsored',
                                'instructions' => 'Activate if this article consists of sponsored content for promotional purposes.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                            ],
                        ],
                        // [
                        //     'handle' => 'apple_news_accessory_text',
                        //     'field' => [
                        //         'input_type:' => 'text',
                        //         'character_limit' => 100,
                        //         'antlers' => false,
                        //         'display' => 'Accessory Text',
                        //         'instructions' => 'The text to include below the article excerpt in the channel view, such as a byline or category label.',
                        //         'type' => 'text',
                        //         'icon' => 'text',
                        //         'listable' => false,
                        //         'validate' => [
                        //             'max:100'
                        //         ],
                        //     ],
                        // ],
                        [
                            'handle' => 'apple_news_maturity_rating',
                            'field' => [
                                'type' => 'select',
                                'display' => 'Maturity Rating',
                                'instructions' => 'Define the maturity rating for this article.',
                                'options' => [
                                    'GENERAL' => 'General',
                                    'KIDS' => 'Kids',
                                    'MATURE' => 'Mature (explicit content)',
                                ],
                                'icon' => 'select',
                                'listable' => 'hidden',
                                'multiple' => false,
                                'clearable' => true,
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
