<?php
    include "../classes/account.php";
    $acc = new Account($_GET["id"]);
    echo json_encode($acc->consultaSaldo());