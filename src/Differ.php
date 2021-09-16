<?php

namespace Differ\Differ;

use function Differ\Parser\parse;
use Funct\Collection;

function fileDiff(string $filepath1, string $filepath2, string $format = 'stylish'): string
{
    $file1 = parse(genAbsolutPath($filepath1));
    $file2 = parse(genAbsolutPath($filepath2));
    $ast = buildAst($file1, $file2);
    $render = "Differ\\Formatters\\{$format}\\render";
    return $render($ast);
}

function genAbsolutPath($pathToFile)
{
    $absolutPath = $pathToFile[0] === '/' ? $pathToFile : __DIR__ . "/{$pathToFile}";
    if (file_exists($absolutPath)) {
        return $absolutPath;
    }
    throw new \Exception("The '{$pathToFile}' doesn't exists");
}

function buildAst($arr1, $arr2)
{
    $unionKeys = Collection\union(array_keys($arr1), array_keys($arr2));
    $result = array_reduce($unionKeys, function ($acc, $value) use ($arr1, $arr2) {
        if (isset($arr1[$value]) && !isset($arr2[$value])) {
            $nodeType = 'deleted';
            $acc[] = buildNode($nodeType, $value, $arr1[$value], '');
        } elseif (!isset($arr1[$value])) {
            $nodeType = 'added';
            $acc[] = buildNode($nodeType, $value, $arr2[$value], '');
        } elseif (is_array($arr1[$value]) && is_array($arr2[$value])) {
            $nodeType = 'nested';
            $children = buildAST($arr1[$value], $arr2[$value]);
            $acc[] = buildNode($nodeType, $value, '', '', $children);
        } elseif ($arr1[$value] === $arr2[$value]) {
            $nodeType = 'not changed';
            $acc[] = buildNode($nodeType, $value, $arr1[$value], $arr2[$value]);
        } else {
            $nodeType = 'changed';
            $acc[] = buildNode($nodeType, $value, $arr1[$value], $arr2[$value]);
        }
        return $acc;
    });
    return $result;
}

function buildNode($nodeType, $name, $oldValue, $newValue, $children = [])
{
    return [
        'status' => $nodeType,
        'name' => $name,
        'oldValue' => $oldValue,
        'newValue' => $newValue,
        'children' => $children
    ];
}