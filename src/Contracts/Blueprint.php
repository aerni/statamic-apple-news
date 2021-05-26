<?php

namespace Aerni\AppleNews\Contracts;

interface Blueprint
{
    /**
     * Return an instance of a blueprint, populated with fields
     *
     * @return Statamic\Facades\Blueprint
     */
    public static function make();
}
