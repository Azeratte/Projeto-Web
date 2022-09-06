<?php
class Cliente
{
    private $id;
    private $nome;
    private $email;
    private $sexo;


    function __construct($id, $name, $email, $sexo)
    {
        $this->id = $id;
        $this->nome = $name;
        $this->email = $email;
        $this->sexo = $sexo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($name)
    {
        $this->nome = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
}
