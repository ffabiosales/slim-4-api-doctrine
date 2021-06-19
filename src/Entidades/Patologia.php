<?php

namespace App\Entidades;

/** @Entity */
class Patologia implements \JsonSerializable
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @var string
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @var string
     * @Column(type="string")
     */
    private ?string $descricao;

    /**
     * @Column(type="integer")
     */
    private int $situacao;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'situacao' => $this->situacao,
        ];
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->name;
    }

    /**
     * @return self
     */
    public function setNome(String $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    
    /**
     * @return self
     */
    public function setDescricao(String $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return string
     */
    public function getSituacao(): int
    {
        return $this->situacao;
    }

    /**
     * @return self
     */
    public function setSituacao(int $situacao): self
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function toArray()
    {
        return [ 
            'id' => $this->id, 
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'situacao' => $this->situacao
        ];
    }
}
