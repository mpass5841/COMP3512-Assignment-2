<?php
function getUsers(){
    require_once 'a2-helper.php';
    require_once 'configa2.inc.php';
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER, DBPASS));
    $users = new UserDB($conn);
        $userList = $users->getAllUsers();
        return $userList;  
    }


?>