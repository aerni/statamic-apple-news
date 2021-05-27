<?php

namespace Aerni\AppleNews\Facades;

use Aerni\AppleNews\Contracts\TemplateRepository;
use Illuminate\Support\Facades\Facade;

class Template extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TemplateRepository::class;
    }
}
