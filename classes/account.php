<?php

class Account{
    private $id;
    private $cpf;
    private $senha;
    private $saldo;

    public function __construct($cpf, $senha){
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function setCPF($cpf){
        $this->$cpf = $cpf;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->$senha = $senha;
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

    public function login(){
        require "../database/connection/conn.php";
        $q = $conn->prepare("SELECT count(*) FROM tb_conta WHERE cd_cpf =:cpf AND cd_senha =:senha");
        $q->bindValue(':cpf', $this->cpf);
        $q->bindValue(':senha', $this->senha);
        $q->execute();
        if($q->fetchColumn()){
            return true;
        }
        else{
            return false;
        }
    }
}