<?php
     $servername = "10.230.108.80";
     $username = "lucia";
     $password = "O3775AmD?";

     // Create and check connection
     try {
         $conn = new PDO("mysql:host=$servername", $username, $password);
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo "Connected successfully";

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