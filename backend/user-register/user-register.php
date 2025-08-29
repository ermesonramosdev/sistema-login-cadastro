<?php
    require_once("../conexao.php");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if(empty($data)) {
        $stmf = $pdo->query("SELECT * FROM users");
        $users = $stmf->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user) {
            echo "Nome: " . $user['nome'] . "<hr>";
            echo "Email: " . $user['email'] . "<hr>";
            echo "Email: " . $user['senha'] . "<hr>";
        }
    } else {
        echo "Não pegou nada esse karai";
    }
