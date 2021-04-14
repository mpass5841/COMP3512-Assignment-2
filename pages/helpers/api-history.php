<?php

function getHistory($symbol){
require_once 'a2-helper.php';
require_once 'configa2.inc.php';
$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER, DBPASS));
$companies = new CompanyDB($conn);
    $historyList = $companies->getStockHistory($symbol);
    return $historyList;  
}
?>