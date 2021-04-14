<?php

function getPortfolio($id){
    require_once 'a2-helper.php';
    require_once 'configa2.inc.php';
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER, DBPASS));
    $portfolio = new UserDB($conn);
        $portfolioList = $portfolio->getUserPortfolio($id);
        
        return $portfolioList;  
    }

?>