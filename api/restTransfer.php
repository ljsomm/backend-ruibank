<?php
    include "../classes/transfer.php";
    include "../classes/account.php";
    date_default_timezone_set("America/Sao_Paulo");
    $transfer = new Transfer(new Account(51074986604), new Account(12312312312), date("d/m/y h:i:s"), 1000.50);
    echo json_encode($transfer->transferencia());