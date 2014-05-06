<?php

\error_reporting(E_ALL);
\ini_set('display_errors', '1');
require_once('../lib/autoload.php');

try {
    \Application::run();
} catch (Exception $e) {
    echo '<pre>';
    echo 'Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine() . PHP_EOL . PHP_EOL;
    if (is_array($e->getTrace())) {
        echo 'Call Stack: ' . PHP_EOL;
        $i = 1;
        foreach ($e->getTrace() as $stack) {
            echo '    ' . $i . '. ' . $stack['function'] . '(' . \implode(', ', $stack['args']) . ') ' . $stack['file'] . ':' . $stack['line'] . PHP_EOL;
        }
    }
    echo '</pre>';
}