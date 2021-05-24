<?php

namespace Aerni\AppleNews\Contracts;

use ChapterThree\AppleNewsAPI\Document;
use Statamic\Contracts\Entries\Entry;

interface Article
{
    public function from(Entry $entry): Document;
}
