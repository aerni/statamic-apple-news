<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document;
use Statamic\Contracts\Entries\Entry;

interface Article
{
    /**
     * Set the entry to create an article from.
     */
    public function from(Entry $entry): Document;
}
