<?php

namespace Aerni\AppleNews\Actions;

use Aerni\AppleNews\Facades\AppleNewsStorage;
use ChapterThree\AppleNewsAPI\Document;
use ChapterThree\AppleNewsAPI\Document\Components\Body;
use ChapterThree\AppleNewsAPI\Document\Layouts\Layout;
use ChapterThree\AppleNewsAPI\Document\Styles\ComponentTextStyle;
use Statamic\Entries\Entry;

class CreateArticleAction
{
    public function execute(Entry $entry): void
    {
        $id = $entry->slug();
        $collection = $entry->collectionHandle();
        $title = $entry->get('title');
        $locale = $entry->site()->shortLocale();

        $article = (new Document($id, $title, $locale, new Layout(7, 1024)))
            ->addComponent(new Body('body text'))
            ->addComponentTextStyle('default', new ComponentTextStyle())
            ->json();

        AppleNewsStorage::putArticle($collection, $id, $article);

        ray('created');
    }
}
