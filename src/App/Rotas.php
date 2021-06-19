<?php

// namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Controller\PatologiaController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Simples.vet");
    return $response;
});

$app->group('/api/v1', function (RouteCollectorProxy $group) {

    // TODO nested groups tem algum bug no Slim v4?
    // $app->group('/patologias', function () use ($app): void {

    //     $app->get('', PatologiaController::class . ':listar');
    //     $app->post('', PatologiaController::class . ':cadastrar');
    //     // $app->get('/{id}', PatologiaController::class . ':mostrar');
    //     // $app->put('/{id}', PatologiaController::class . ':atualizar');
    //     // $app->delete('/{id}', PatologiaController::class . ':apagar');
    // });

    $group->get('/patologias', PatologiaController::class . ':listar');
    $group->post('/patologias', 'PatologiaController:cadastrar');
    // $group->post('/patologias', function (
    //     ServerRequestInterface $request, 
    //     ResponseInterface $response
    //     ): ResponseInterface {
    //     // Retrieve the JSON data
    //     $data = (array)$request->getParsedBody();

    //     // Your code here
    //     $response->getBody()->write('Create user');

    //     return $response;
    // });
    // Allow preflight requests for /example
    $group->options('/patologias', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        return $response;
    });
    $group->get('/patologias/{id}', PatologiaController::class . ':mostrar');
    $group->put('/patologias/{id}', PatologiaController::class . ':atualizar');
    $group->delete('/patologias/{id}', PatologiaController::class . ':apagar');
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
