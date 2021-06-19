<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Entidades\Patologia;

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
        $instancia = $this->container->get('em')->getRepository('App\Entidades\Patologia');

        $patologias = $instancia->findAll();

        $response->getBody()->write(json_encode($patologias));

        return $response;
    }

    public function cadastrar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $dados = (array)$request->getParsedBody();

        $patologia = new Patologia();
        $patologia->setNome($dados['nome']);
        $patologia->setDescricao($dados['descricao']);
        $patologia->setSituacao($dados['situacao'] ? $dados['situacao'] : 0);

        $instancia = $this->container->get('em');
        $instancia->persist($patologia);
        $instancia->flush();

        $response->getBody()->write(json_encode($dados));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function mostrar(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $request->getAttribute('id');

        $instancia = $this->container->get('em')->getRepository('App\Entidades\Patologia');

        $patologia = $instancia->find($id);

        $response->getBody()->write(json_encode($patologia));

        return $response
            ->withHeader('Content-Type', 'application/json');
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
