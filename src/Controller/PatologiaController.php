<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PatologiaController
{
    // https://www.slimframework.com/docs/v3/objects/router.html#container-resolution

    private $container;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $patologias = [
            ['nome' => "doença ruim"]
        ];
        $response->getBody()->write(json_encode($patologias));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function cadastrar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        return $response;
    }

    public function mostrar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        return $response;
    }

    public function atualizar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        return $response;
    }

    public function apagar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        return $response;
    }
}
