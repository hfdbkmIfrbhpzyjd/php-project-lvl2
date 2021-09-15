<?php

namespace Differ\Tests;

use PHPUnit\Framework\TestCase;
use function Differ\Differ\fileDiff;
use function Differ\Parser\parse;


class StackTest extends TestCase
{
    public function testParse()
    {
        $filepath = 'tests/fixtures/file1.json';
        $file = file_get_contents($filepath);
        $expected = [
          "host" => "hexlet.io",
          "timeout" => 50,
          "proxy" => "123.234.53.22",
          "follow" => "false"
        ];

        $this->assertEquals($expected, parse($filepath));
    }

    public function testFileDiff()
    {
        $filepath1 = 'tests/fixtures/file1.json';
        $filepath2 = 'tests/fixtures/file2.json';
        $expected = file_get_contents('tests/fixtures/expectForDiffer');
        
        $this->assertEquals($expected, fileDiff($filepath1, $filepath2));
    }
}
