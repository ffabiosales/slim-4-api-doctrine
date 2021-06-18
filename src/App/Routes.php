<?php


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Simples.vet");
    return $response;
});

// $app->group('/api/v1', function () use ($app): void {

//     $app->group('/patologias', function () use ($app): void {
//         $app->get('', function(Request $request, Response $response, $args) {

//             $response->getBody()->write("Simples.vet");
//             return $response;
//         });
//     });
// });

$app->group('/api/v1', function () use ($app) : void {

    $app->group('/patologias', function ($request, $response, array $args) use ($app) : void {

        $app->get('', function ($request, $response, array $args) {
            $patologias = [
                ['nome' => "doença ruim"]
            ];

            $response->getBody()->write(json_encode($patologias));

            return $response
                ->withHeader('Content-Type', 'application/json');
        });
    });
});
