<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Entidades\Patologia;

class ExportarController
{
    private $container;
    private $db;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = $this->container->get('em');
    }

    public function exportar(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $id = $request->getAttribute('id');

        $instancia = $this->db->getRepository('App\Entidades\Patologia');

        $patologia = $instancia->find($id);

        $this->db->flush();

        $response->getBody()->write(json_encode($patologia));

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
