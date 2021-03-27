<?php

class Account{
    private $id;
    private $cpf;
    private $senha;
    private $saldo;

    public function __construct($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function consultaSaldo(){
        require "../database/connection/conn.php";
        $q = $conn->prepare("SELECT vl_saldo FROM tb_conta WHERE cd_conta = :codigo");
        $q->bindValue(":codigo", 1);  
        $q->execute();
        $conn = null;   
        return $q->fetchColumn();
    }
}