<?php
    include "../classes/transfer.php";
    include "../classes/account.php";
    date_default_timezone_set("America/Sao_Paulo");
    $users = array(new Account(51074986604),  new Account(12312312312));
    $transfer = new Transfer($users[0]->retornaId(), $users[1]->retornaId(), date("d/m/y h:i:s"));
    echo json_encode($transfer->transferencia());