<?php

namespace Grechanyuk\TinyPNG\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static fromFile(string $fromFile, string $toFile = null)
 * @method static fromBuffer(string $fromBuffer, string $toFile)
 * @method static fromURL(string $url, string $toFile)
 * @throws \InvalidArgumentException
 */
class TinyPNG extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tinypng';
    }
}
