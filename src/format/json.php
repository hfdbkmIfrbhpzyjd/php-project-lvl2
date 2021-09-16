<?php

namespace Differ\Formatters\json;

function render($data)
{
    return json_encode($data, JSON_PRETTY_PRINT);
}
