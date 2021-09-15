<?php

namespace Differ\Parser;

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
    $contentAssoc = json_decode($content, true);
    return array_map(fn($el) => is_bool($el) ? (true ? 'true' : 'false') : $el, $contentAssoc);
}
