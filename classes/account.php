<?php

class Account{
    private $cpf;
    private $senha;
    private $saldo;

    public function __construct(){
        $p = func_get_args();
        $q = func_num_args();
        switch($q){
            case 1:
                $this->__construct1($p);
                break;
            case 2:
                    $this->__construct2($p);
                    break;
        }
    }

    public function __construct1($arr){
        $this->cpf = $arr[0];
    }

    public function __construct2($arr){
        $this->cpf = $arr[0];
        $this->senha = $arr[1];
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

    public function retornaId(){
        require "../database/connection/conn.php";
        $sel = $conn->prepare("SELECT cd_conta FROM tb_conta WHERE cd_cpf = :cpf");
        $sel->bindValue(":cpf", $this->cpf);
        if($sel->execute()){
            return $sel->fetchColumn();
        }
        else{
            return false;
        }
    }

}