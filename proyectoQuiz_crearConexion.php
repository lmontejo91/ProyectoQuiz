<?php
     $servername = "localhost";
     $username = "root";
     $password = "root";

     // Create and check connection
     try {
         $conn = new PDO("mysql:host=$servername", $username, $password);
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "Connected successfully";

         // Create data base IF NOT EXISTS
         if($conn->query("CREATE DATABASE IF NOT EXISTS Juego") === true){
             $conn->query("USE Juego");
             //$conn->query("source Downloads/Proyecto QUIZ");
         }else{
            $conn->query("USE Juego");
         }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>