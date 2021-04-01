<?php
    include "../classes/transfer.php";
    date_default_timezone_set("America/Sao_Paulo");
    $transfer = new Transfer(1, 2, date("d/m/y h:i:s"));
    echo json_encode($transfer->transferencia());