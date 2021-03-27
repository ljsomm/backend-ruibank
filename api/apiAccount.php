<?php
    include "../classes/account.php";
    $acc = new Account($_GET["id"]);
    echo $acc->consultaSaldo();