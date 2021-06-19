<?php

// namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Controller\PatologiaController;

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Simples.vet");
    return $response;
});

$app->group('/api/v1', function (RouteCollectorProxy $app) {

    // TODO nested groups tem algum bug no Slim v4?
    // $app->group('/patologias', function () use ($app): void {
        
    //     $app->get('', PatologiaController::class . ':listar');
    //     $app->post('', PatologiaController::class . ':cadastrar');
    //     // $app->get('/{id}', PatologiaController::class . ':mostrar');
    //     // $app->put('/{id}', PatologiaController::class . ':atualizar');
    //     // $app->delete('/{id}', PatologiaController::class . ':apagar');
    // });

    $app->get('/patologias', PatologiaController::class . ':listar');
    $app->post('/patologias', PatologiaController::class . ':cadastrar');
    $app->get('/patologias/{id}', PatologiaController::class . ':mostrar');
    $app->put('/patologias/{id}', PatologiaController::class . ':atualizar');
    $app->delete('/patologias/{id}', PatologiaController::class . ':apagar');
});

// $app->group('/api/v1', function () use ($app) : void {

//     $app->group('/patologias', function (Group $group ) {

//         $app->get('', PatologiaController::class . ':listar');
//         $app->post('', PatologiaController::class . ':cadastrar');
//         $app->get('/{id}', PatologiaController::class . ':mostrar');
//         $app->put('/{id}', PatologiaController::class . ':atualizar');
//         $app->delete('/{id}', PatologiaController::class . ':apagar');
//     });
// });
