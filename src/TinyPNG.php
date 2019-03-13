<?php

namespace Grechanyuk\TinyPNG;

use Tinify\Exception;
use Tinify\Source;
use Tinify\Tinify;

class TinyPNG
{
    private $client;

    /**
     * TinyPNG constructor.
     */
    public function __construct()
    {
        $apiKey = config('tinypng.api_key');

        if (!$apiKey) {
            throw new \InvalidArgumentException('Please set TINY_PNG_API_KEY to .env!');
        }

        $this->client = new Tinify();
        try {
            $this->client->setKey($apiKey);
            \Tinify\validate();
        } catch (Exception $e) {
            throw new \InvalidArgumentException('TINY_PNG_API_KEY is not valid!');
        }
    }

    /**
     * @param string $path
     * @param string|null $toFile
     */
    public function fromFile(string $path, string $toFile = null)
    {
        $source = Source::fromFile($path);
        if($toFile) {
            $source->toFile($toFile);
        } else {
            $source->toFile($path);
        }
    }

    /**
     * @param string $string
     * @param string $toFile
     */
    public function fromBuffer(string $string, string $toFile)
    {
        $source = Source::fromBuffer($string);
        $source->toFile($toFile);
    }

    /**
     * @param string $url
     * @param string $toFile
     */
    public function fromURL(string $url, string $toFile)
    {
        $source = Source::fromUrl($url);
        $source->toFile($toFile);
    }
}