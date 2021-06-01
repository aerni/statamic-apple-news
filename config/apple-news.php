<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Apple News API
    |--------------------------------------------------------------------------
    |
    | The Apple News API credentials of your channel.
    |
    */

    'id' => env('APPLE_NEWS_CHANNEL_ID'),
    'key' => env('APPLE_NEWS_KEY'),
    'secret' => env('APPLE_NEWS_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Site
    |--------------------------------------------------------------------------
    |
    | The handle of the site you want to use to publish to Apple News.
    |
    */

    'site' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    |
    | The handles of the collections you want to publish articles from.
    |
    */

    'collections' => [
        // 'articles',
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | The templates for your Apple News articles.
    |
    */

    'templates' => [
        // \App\AppleNews\DefaultTemplate::class,
    ],

];
