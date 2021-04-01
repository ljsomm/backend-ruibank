<?php

class Transfer{
    private $hash;
    private $origem;
    private $destino;

    public function __construct(){
        $p = func_get_args();
        $q = func_num_args();
        switch($q){
            case 3:
                    $this->__construct3($p);
                    break;
        }
    }

    public function __construct3($args){
        $this->origem = $args[0];
        $this->destino = $args[1];
        $this->hash = md5($args[2]);
    }

    public function getHash(){
        return $this->hash;
    }

    public function setHash($data){
        $this->hash = md5($data);
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

    public function transferencia(){
        require "../database/connection/conn.php";
        $q = $conn->prepare("INSERT INTO tb_transacao (cd_transacao, cd_hash, cd_conta_origem, cd_conta_destino) VALUES (1, :h, :o, :d)");
        $q->bindValue(":h", $this->hash);
        $q->bindValue(":o", $this->origem);
        $q->bindValue(":d", $this->destino);
        if($q->execute()){
            return true;
        }
        else{
            return 0;
        }
    }
}