<?php
/*
    $host = "localhost";
    $user = "postgres";
    $pass = "169248";
    $name = "IsaMeloNutri";

    try {
        $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$name", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

       // echo "Conectado ao banco de dados!";
    } catch (PDOException $e) {
        echo "Falha ao conectar <br/>";
        die($e->getMessage());
    }
*/

    $host = "127.0.0.1";
    $user = "u157759852_isamelonutri";
    $pass = "";
    $name = "u157759852_IsaMeloNutri";

    try {
        $pdo = new PDO("mysql:host=$host;port=3306;dbname=$name", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

       // echo "Conectado ao banco de dados!";
    } catch (PDOException $e) {
        echo "Falha ao conectar <br/>";
        die($e->getMessage());
    }
        
?>

