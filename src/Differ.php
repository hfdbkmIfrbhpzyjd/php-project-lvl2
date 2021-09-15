<?php

namespace Differ\Differ;

use function Differ\Parser\parse;

function fileDiff(string $filepath1, string $filepath2, string $format = 'stylish'): string
{
    $file1 = parse($filepath1);
    $file2 = parse($filepath2);
    $keys = array_unique(array_merge(array_keys($file1), array_keys($file2)));
    sort($keys);
    $res = [];
    foreach ($keys as $key) {
        if (!array_key_exists($key, $file1)) {
            $res[] = "+ {$key}: $file2[$key]";
        } elseif (!array_key_exists($key, $file2)) {
            $res[] = "- {$key}: $file1[$key]";
        } elseif ($file1[$key] === $file2[$key]) {
            $res[] = "  {$key}: $file1[$key]";
        } else {
                $res[] = "- {$key}: $file1[$key]";
                $res[] = "+ {$key}: $file2[$key]";
        }
    }
    return '{' . PHP_EOL . implode(PHP_EOL, $res) . PHP_EOL . '}';
}
