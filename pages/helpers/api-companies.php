<?php

function getCompany(){
require_once 'a2-helper.php';
require_once 'configa2.inc.php';
$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER, DBPASS));
$companies = new CompanyDB($conn);
if(isset($_GET['symbol'])){
$symbol = $_GET['symbol'];
    $companyList = $companies->getSingleCompany($symbol);
    //header('Content-Type: application/json');
    return $companyList;  
}else{
    $companyList = $companies->getAllCompanies();
    //header('Content-Type: application/json');
    return $companyList;
}
}
?>
