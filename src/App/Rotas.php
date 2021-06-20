<?php

// namespace App\Controller;

use App\Controller\ExportarController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Controller\PatologiaController;
use App\Controller\PreflightController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Simples.vet");
    return $response;
});

$app->group('/api/v1', function (RouteCollectorProxy $group) {

    // TODO nested groups tem algum bug no Slim v4?

    $group->get('/patologias', PatologiaController::class . ':listar');
    $group->post('/patologias', PatologiaController::class . ':cadastrar');
    // https://www.slimframework.com/docs/v4/cookbook/enable-cors.html
    // Invocando de Controllers\PreflightController
    $group->options('/patologias', PreflightController::class);
    $group->get('/patologias/{id}', PatologiaController::class . ':mostrar');
    $group->patch('/patologias/{id}', PatologiaController::class . ':atualizar');
    $group->options('/patologias/{id}', PreflightController::class);
    $group->delete('/patologias/{id}', PatologiaController::class . ':apagar');

    $group->get('/patologias/exportar', ExportarController::class . ':exportar');

});