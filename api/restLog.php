<?php
    include "../classes/transfer.php";
    $transfer = new Transfer();
    echo json_encode($transfer->retornaTodos());