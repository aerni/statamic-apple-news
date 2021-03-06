![Statamic](https://flat.badgen.net/badge/Statamic/3.0+/FF269E) ![Packagist version](https://flat.badgen.net/packagist/v/aerni/apple-news/latest) ![Packagist Total Downloads](https://flat.badgen.net/packagist/dt/aerni/apple-news)

# Apple News
This Statamic addon provides a powerful integration with Apple News, making it possible to publish your collection entries to iPhone, iPad, and Mac users around the world.

## Prerequisites
You first need to [apply for News Publisher](https://www.icloud.com/newspublisher/) and create a channel before you can start publishing your content. Note that new channels have to go through an approval process before you can use them.

Next, you need to get your channel's ID and API Credentials. You can get those in News Publisher `Settings -> Connect CMS -> API Key`.

## Installation
Install the addon using Composer:

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
    | The handle of the site you want to use to publish on Apple News.
    |
    */

    'site' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    |
    | The handles of the collections whose entries you want to publish.
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
```

## Configuration

### Apple News API
Add your Apple News API credentials to your `.env` file:

```env
APPLE_NEWS_CHANNEL_ID=************************************
APPLE_NEWS_KEY=************************************
APPLE_NEWS_SECRET=********************************************
```

### Site
Add the handle of the site you want to use to publish on Apple News:

```php
'site' => 'default'
```

### Collections
Add the handles of the collections whose entries you want to publish on Apple News:

```php
'collections' => [
    'articles',
    'interviews'
]
```

### Templates
Add your article template classes:

```php
'templates' => [
    \App\AppleNews\DefaultTemplate::class,
    \App\AppleNews\InterviewTemplate::class,
]
```

## Article Templates

### Creating a template
Create your first article template:

```bash
php please apple-news:template {name}
```

This will publish a new template to `app/AppleNews/{name}.php`.

### Customizing a template
Each template consists of a set of methods to configure your articles. They are powered by the excellent [AppleNewsAPI](https://github.com/chapter-three/AppleNewsAPI) library that lets you define your article's layout, components, styles, etc. Make sure to [take a look at the source](https://github.com/chapter-three/AppleNewsAPI/tree/master/src/Document) to get an idea of the classes and methods available to you.

## Previewing an article

[News Preview](https://developer.apple.com/news-preview/) is an app provided by Apple that lets you preview your articles in the News app. This is super useful when building out your templates.

Use the following command and provide the `id` of the Statamic entry you want to use for preview:

```bash
php please apple-news:preview {entryId}
```

This creates an `article.json` file of the entry in `storage/statamic/addons/apple-news/preview/`.

Open the `News Preview` app, select the `article.json` file, and choose the device you want to use to preview your article.

## Publishing Workflow

### Publishing
Open the entry in the Statamic Control Panel that you want to publish on Apple News. Navigate to the `Apple News` tab and customize the options to your liking. Once you're ready to publish, flick the `Published` toggle and save the entry. The article is now being processed by Apple News. Refresh the page to see the current `Publish State`.

### Updating
The article will be updated every time you save the Statamic entry.

> **Note:** The article is updated every time the `Statamic\Events\EntrySaving` event is dispatched.

### Unpublishing / Deleting
Unflick the `Published` toggle to delete the article from Apple News. Deleting the Statamic entry will do the same.

> **Note:** Apple News doesn't support unpublishing an article. Articles can only be deleted. Alternatively you can use the `Hidden` toggle to hide the article from Apple News feeds.

## License
Apple News is **commercial software** but has an open-source codebase. If you want to use it in production, you'll need to [buy a license from the Statamic Marketplace](https://statamic.com/addons/aerni/apple-news).
>Apple News is **NOT** free software.

## Credits
Developed by [Michael Aerni](https://www.michaelaerni.ch)

## Special Thanks
Many thanks to [Duo Security](https://duo.com/) and [Cisco](https://www.cisco.com/) for sponsoring this addon.
