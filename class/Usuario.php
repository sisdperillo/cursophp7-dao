<?php

class Usuario
{
    private $idUsuario;
    private $login;
    private $senha;
    private $dataCadastro;

    public function getIdUsuario():string
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getLogin():string
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha():string
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getDataCadastro():DateTime
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM USUARIO WHERE IDUSUARIO = :ID", array(":ID" => $id));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setIdUsuario($row['IdUsuario']);
            $this->setLogin($row['Login']);
            $this->setSenha($row['Senha']);
            $this->setDataCadastro(new DateTime($row['DataCadastro']));
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "IdUsuario"=>$this->getIdUsuario(),
            "Login"=>$this->getLogin(),
            "Senha"=>$this->getSenha(),
            "DataCadastro"=>$this->getDataCadastro()->format("d/m/Y H:i:s")
        ));
    }
}
