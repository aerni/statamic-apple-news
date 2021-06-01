![Statamic](https://flat.badgen.net/badge/Statamic/3.0+/FF269E) ![Packagist version](https://flat.badgen.net/packagist/v/aerni/apple-news/latest) ![Packagist Total Downloads](https://flat.badgen.net/packagist/dt/aerni/apple-news)

# Apple News
Publish your Statamic collection entries to Apple News.

## Installation
Install the addon using Composer.

```bash
composer require aerni/apple-news
```

Publish the config of the package:

```bash
php please vendor:publish --tag=apple-news-config
```

The following config will be published to `config/apple-news.php`:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Apple News API
    |--------------------------------------------------------------------------
    |
    | The Apple News API credentials for your channel.
    |
    */

    'id' => env('APPLE_NEWS_CHANNEL_ID'),
    'key' => env('APPLE_NEWS_KEY'),
    'secret' => env('APPLE_NEWS_SECRET'),

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
    ]

];
```

## Configuration

### Apple News API
Add your Apple News API credentials to your `.env` file:

```env
APPLE_NEWS_CHANNEL_ID=************************************
APPLE_NEWS_KEY=************************************
APPLE_NEWS_SECRET=********************************************
```

### Collections
Add the handles of the collections whose entries you want to publish to Apple News:

```php
'collections' => [
    'articles',
    'interviews'
],
```

### Templates
Add your custom article template classes:

```php
'collections' => [
    \App\AppleNews\DefaultTemplate::class,
    \App\AppleNews\InterviewTemplate::class,
],
```

## Templates

Create your first article template class:

```bash
php please apple-news:template {name}
```

This will publish a new template to `app/AppleNews/{name}.php`.

## Preview Article in News Preview

[News Preview]((https://developer.apple.com/news-preview/)) is an app provided by Apple that lets you preview your articles in the News app. This is super useful when building out your templates.

Use the following command and provide the id of the entry you want to preview:

```bash
php please apple-news:preview {entryId}
```

This will create the `article.json` file in `storage/statamic/addons/apple-news/preview/`.

Open the `News Preview` app, select the `article.json` and the device you want to use for preview.

## Basic usage
Navigate to the collection entry you want to publish on Apple News. You will see a new tab "Apple News" at the top. Customize the options to your liking. When you're ready to publish, flick the toggle called "Published". You're article is now being processed by Apple News.

## License
Apple News is **commercial software** but has an open-source codebase. If you want to use it in production, you'll need to [buy a license from the Statamic Marketplace](https://statamic.com/addons/aerni/apple-news).
>Apple News is **NOT** free software.

## Credits
Developed by [Michael Aerni](https://www.michaelaerni.ch)

## Special Thanks
Many thanks to [Duo Security](https://duo.com/) and [Cisco](https://www.cisco.com/) for sponsoring this addon.
