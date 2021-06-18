<?php

use Slim\Factory\AppFactory;

$baseDir = __DIR__ . '/../../';

require $baseDir . 'vendor/autoload.php';

$app = AppFactory::create();

require __DIR__ . '/Routes.php';