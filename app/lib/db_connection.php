<?php
    $db_host = "mcsdb.utm.utoronto.ca";
    $db_port = 5432;
    $db_name = "sidhuj23_309";
    $db_user = "sidhuj23";
    $db_password = "21307";


    function db_connect(){

        try{
            $db_string = "pgsql:";
            $db_string .= "host=" . $GLOBALS['db_host'] . ";";
            $db_string .= "port=" . $GLOBALS['db_port'] . ";";
            $db_string .= "dbname=" . $GLOBALS['db_name'] . ";";
            $db_string .= "user=" . $GLOBALS['db_user'] . ";";
            $db_string .= "password=" . $GLOBALS['db_password'];

            $conn = new PDO($db_string);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $conn;
    }
?>
