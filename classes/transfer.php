<?php

class Transfer{
    private $hash;
    private $origem;
    private $destino;

    public function __construct(){
        
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


}