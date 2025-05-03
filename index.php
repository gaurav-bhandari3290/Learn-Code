<?php
require_once 'Exceptions.php';
require_once 'Server.php';
require_once 'Account.php';
require_once 'Card.php';
require_once 'ATM.php';

$server = new BankServer(true);
$atm = new ATM(10000, $server);
$card = new Card("1234-5678-9012", "1234");
$account = new Account(5000, 3000);

try {
    $atm->withdraw($card, $account, "1234", 2000);
} catch (ATMException $e) {
    echo "Error: " . $e->getMessage();
}