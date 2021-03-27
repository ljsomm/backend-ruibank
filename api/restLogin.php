<?php
    include "../classes/account.php";
    $acc = new Account($_POST["cpf"], $_POST["senha"]);
    $v = $acc->login();
    echo json_encode($v);
    if($v){
        session_start();
        $_SESSION["cpf"] = $acc->getCPF();
        $_SESSION["senha"] = $acc->getSenha();
    }
    