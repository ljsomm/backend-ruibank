<?php
    include "../classes/transfer.php";
    include "../classes/account.php";
    date_default_timezone_set("America/Sao_Paulo");
    $transfer = new Transfer(new Account($_POST["origem"]), new Account($_POST["destino"]), date("d/m/y h:i:s"), $_POST["valor"]);
    echo json_encode($transfer->transferencia());