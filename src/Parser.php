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
            $contentAssoc = json_decode($content, true);
            return array_map(fn($el) => is_bool($el) ? ($el === true ? 'true' : 'false') : $el, $contentAssoc);
        case 'yml' || 'yaml':
            $contentAssoc = Yaml::parse($content);
            return array_map(fn($el) => is_bool($el) ? ($el === true ? 'true' : 'false') : $el, $contentAssoc);
        default :
            return new ParseError();
    }
}
