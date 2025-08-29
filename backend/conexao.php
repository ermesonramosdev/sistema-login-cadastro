<?php 
    $localhost = "localhost";
    $dbname = "bd_sistema_login_cadastro";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $user, $password);
    } catch(PDOException $e) {
        echo "Deu erro por causa disso: $e";
    }