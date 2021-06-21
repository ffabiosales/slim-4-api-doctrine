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
    private $db;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = $this->container->get('em');
    }

    public function listar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {   

        $instancia = $this->db->getRepository('App\Entidades\Patologia');
        $patologias = $instancia->findAll();

        $response->getBody()->write(json_encode($patologias));

        return $response
            ->withHeader('Content-Type', 'application/json');;
    }

    public function cadastrar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $dados = (array)$request->getParsedBody();

        $patologia = new Patologia();
        $patologia->setNome($dados['nome']);
        $patologia->setDescricao($dados['descricao']);
        $patologia->setSituacao($dados['situacao'] ? $dados['situacao'] : 0);

        $this->db->persist($patologia);
        $this->db->flush();

        $response->getBody()->write(json_encode($dados));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function mostrar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $id = $request->getAttribute('id');

        $instancia = $this->db->getRepository('App\Entidades\Patologia');

        $patologia = $instancia->find($id);

        $this->db->flush();

        $response->getBody()->write(json_encode($patologia));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function atualizar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $id = $request->getAttribute('id');

        // Dados usados para atualizar a patologia
        $dados = $request->getParsedBody();

        $instancia = $this->db->getRepository('App\Entidades\Patologia');

        $patologia = $instancia->find($id);

        $patologia->setNome($dados['nome']);
        $patologia->setDescricao($dados['descricao']);
        $patologia->setSituacao($dados['situacao']);

        $this->db->flush();

        $response->getBody()->write(json_encode($patologia));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    public function apagar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $id = $request->getAttribute('id');

        $instancia = $this->db->getRepository('App\Entidades\Patologia');

        $patologia = $instancia->find($id);

        // Caso a $patologia não exista/já tenha sido excluida;
        if (!$patologia)
            return $response->withStatus(404);

        $this->db->remove($patologia);

        $this->db->flush();

        return $response
            ->withStatus(200);
    }
}
