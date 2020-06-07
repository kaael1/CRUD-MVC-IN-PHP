<?php

class Projeto
{

    private $id;
    private $nome;
    private $duracao;

    private $con;

    /**
     * Projeto constructor.
     * @param $id
     * @param $nome
     * @param $duracao
     */
    public function __construct($id=null, $nome=null, $duracao=null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->duracao = $duracao;


        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }


    public function all(){

        $sql = $this->con->prepare("SELECT * FROM projeto");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;

    }
    public function create(){

        $sql = $this->con->prepare("INSERT INTO projeto (nome, duracao) VALUES (?,?)");
        $sql->execute([$this->nome,$this->duracao]);

        if ($sql->errorCode()=='00000'){
            $_SESSION['msg']="<div class='alert alert-success'>Registro inserido com sucesso</div>";
            header("Location: ./?classe=Projeto&acao=all");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
        }

    }
    public function read(){

        $sql = $this->con->prepare("SELECT * FROM projeto WHERE id=?");
        $sql->execute([$this->id]);
        $row = $sql->fetchObject();
        return $row;

    }
    public function update(){ 

        $sql = $this->con->prepare("UPDATE projeto SET nome=?, duracao=? WHERE id=?");
        $sql->execute([$this->nome, $this->duracao, $this->id ]);

        if ($sql->errorCode()=='00000'){
            $_SESSION['msg']="<div class='alert alert-success'>Registro inserido com sucesso</div>";
            header("Location: ./?classe=Projeto&acao=all");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
        }

    }
    public function delete(){

        $sql = $this->con->prepare("DELETE FROM projeto WHERE id = $this->id");
        $sql->execute();

        if ($sql->errorCode()=='00000'){
            $_SESSION['msg']="<div class='alert alert-success'>Registro excluído com sucesso</div>";
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
        }

    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return null
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * @param null $duracao
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }



}