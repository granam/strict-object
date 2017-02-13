<?php
if (PHP_MAJOR_VERSION >= 7) {
    include __DIR__ . '/declare_strict_types.php';
}

require_once __DIR__ . '/../../vendor/autoload.php';

error_reporting(-1);
ini_set('display_errors', '1');

ini_set('xdebug.max_nesting_level', '100');
