<?php

class Transfer{
    private $hash;
    private $origem;
    private $destino;
    private $valor;

    public function __construct(){
        $p = func_get_args();
        $q = func_num_args();
        switch($q){
            case 4:
                    $this->__construct4($p);
                    break;
        }
    }

    public function __construct4($args){
        $this->origem = $args[0];
        $this->destino = $args[1];
        $this->hash = md5($args[2] . $this->lastHash());
        $this->valor = $args[3];
    }

    public function getHash(){
        return $this->hash;
    }

    public function setHash($data){
        $this->hash = md5($data . $this->lastHash());
    }

    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
    }

    public function getDestino(){
       return $this->destino;
    }

    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getValor(){
        return $this->destino;
     }
 
     public function setValor($valor){
         $this->valor = $valor;
     }

    public function transferencia(){
        require "../database/connection/conn.php";
        $q = $conn->prepare("INSERT INTO tb_transacao (cd_transacao, cd_hash, cd_conta_origem, cd_conta_destino, vl_transferencia) VALUES (:i, :h, :o, :d, :v)");
        $q->bindValue(":i", $this->lastId() + 1);
        $q->bindValue(":h", $this->hash);
        $q->bindValue(":o", $this->origem->retornaId());
        $q->bindValue(":d", $this->destino->retornaId());
        $q->bindValue(":v", $this->valor);
        if($q->execute()){
            return true;
        }
        else{
            if($q->errorInfo()[1]){
                return array(false, "Usuario nao existe existe");
            }
        }
    }

    public function lastId(){
        require "../database/connection/conn.php";
        $sel = $conn->prepare("SELECT COALESCE(MAX(cd_transacao), 0) FROM tb_transacao");
        $sel->execute();
        return $sel->fetchColumn();
    }

    public function lastHash(){
        require "../database/connection/conn.php";
        $sel = $conn->prepare("SELECT COALESCE(cd_hash, 0) FROM tb_transacao WHERE cd_transacao = :id");
        $sel->bindValue(":id", $this->lastId());
        $sel->execute();
        return $sel->fetchColumn();
    }
}