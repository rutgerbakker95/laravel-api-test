<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'bootstrap/cache',
        'node_modules',
        'templates',
        'vendor',
    ])
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setCacheFile(__DIR__.'/.php_cs.cache')
    ->setFinder($finder);
