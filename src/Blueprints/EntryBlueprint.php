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
                                'instructions' => 'Configure the publishing options for this article. [Learn more](https://developer.apple.com/documentation/apple_news/create_article_metadata_fields) about the available options.',
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_state',
                            'field' => [
                                'type' => 'article_state',
                                'display' => 'Publish State',
                                'instructions' => 'The publish state of this article',
                            ],
                        ],
                        [
                            'handle' => 'apple_news_template',
                            'field' => [
                                'type' => 'select',
                                'display' => 'Template',
                                'instructions' => 'Select the template for this article.',
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
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_published',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Published',
                                'instructions' => 'Publish this article on Apple News.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_preview',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Preview',
                                'instructions' => 'Preview this article before it\'s visible to the public.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'default' => 'true',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_hidden',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Hidden',
                                'instructions' => 'Hide this article from Apple News feeds.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_candidate_to_be_featured',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Featured',
                                'instructions' => 'Consider this article for featuring in Apple News.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_is_sponsored',
                            'field' => [
                                'type' => 'toggle',
                                'display' => 'Sponsored',
                                'instructions' => 'This article consists of sponsored content.',
                                'icon' => 'toggle',
                                'listable' => 'hidden',
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_accessory_text',
                            'field' => [
                                'input_type:' => 'text',
                                'character_limit' => 100,
                                'antlers' => false,
                                'display' => 'Accessory Text',
                                'instructions' => 'The text below the article excerpt.',
                                'type' => 'text',
                                'icon' => 'text',
                                'listable' => false,
                                'validate' => [
                                    'max:100',
                                ],
                                'width' => 50,
                            ],
                        ],
                        [
                            'handle' => 'apple_news_maturity_rating',
                            'field' => [
                                'type' => 'select',
                                'display' => 'Maturity Rating',
                                'instructions' => 'Select the maturity rating for this article.',
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
                                'width' => 50,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
