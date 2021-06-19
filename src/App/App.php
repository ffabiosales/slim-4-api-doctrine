<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use App\Controller\PatologiaController;
use Psr\Container\ContainerInterface;

$baseDir = __DIR__ . '/../../';

require $baseDir . 'vendor/autoload.php';

$containerBuilder = new ContainerBuilder();


// $container = $containerBuilder->build();



// $app = AppFactory::createFromContainer($container);
// $app = AppFactory::create();
// $container = $app->getContainer();

$configuracoes = require __DIR__ . '/Configuracoes.php';
$containerBuilder->addDefinitions($configuracoes);

$container = $containerBuilder->build();


$app = AppFactory::createFromContainer($container);
// require __DIR__ . '/Dependencias.php';
require __DIR__ . '/Rotas.php';