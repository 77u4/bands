<?php

function __autoload($name)
{
    $baseDir = dirname(__FILE__);
    $classFilePath = $baseDir . '/' . $name . '.class.php';
    if (\file_exists($classFilePath)) {
        require($classFilePath);
    } else {
        throw new Exception('Could not load Class "' . $classFilePath . '"', '1');
    }
}
