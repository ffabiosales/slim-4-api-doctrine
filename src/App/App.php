<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use App\Controller\PatologiaController;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\{EntityManager, EntityManagerInterface};
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;


$baseDir = __DIR__ . '/../../';

require $baseDir . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable($baseDir);
$dotenv->load();


$containerBuilder = new ContainerBuilder();


// $container = $containerBuilder->build();



// $app = AppFactory::createFromContainer($container);
// $app = AppFactory::create();
// $container = $app->getContainer();

$configuracoes = require __DIR__ . '/Configuracoes.php';
$containerBuilder->addDefinitions($configuracoes);

$container = $containerBuilder->build();

// Bando de dados com Doctrine pra fazer ORM
require __DIR__ . '/Configuracoes/Doctrine.php';
$entityManager = getEntityManager($container);
$container->set('em', $entityManager);

$app = AppFactory::createFromContainer($container);

// https://www.slimframework.com/docs/v4/middleware/body-parsing.html
// Parse json, form data and xml
$app->addBodyParsingMiddleware();

// require __DIR__ . '/Dependencias.php';
require __DIR__ . '/Rotas.php';
