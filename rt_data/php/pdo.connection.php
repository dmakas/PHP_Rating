<?php

    // Check connection

    try {

        // Set the PDO error mode to exception

        $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully to Database!";

    }catch(PDOException $rt_db_errors){

        echo "Connection failed: " . $rt_db_errors->getMessage();

    }

?>