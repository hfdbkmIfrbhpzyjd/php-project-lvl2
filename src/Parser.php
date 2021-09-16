<?php

namespace Differ\Parser;

use ParseError;
use Symfony\Component\Yaml\Yaml;

function parse(string $path)
{
    if (!file_exists($path)) {
        throw new \Exception("Invalid file path: {$path}");
    }

    $content = file_get_contents($path);
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    if ($content === false) {
        throw new \Exception("Can't read file: {$path}");
    }

    switch ($extension) {
        case 'json':
            return json_decode($content, true);
        case 'yml' || 'yaml':
            return Yaml::parse($content);
        default:
            return new ParseError();
    }
}
