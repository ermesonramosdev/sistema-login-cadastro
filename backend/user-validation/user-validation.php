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
    $datas = json_decode($json);

    $stmt = $pdo->prepare("SELECT * FROM users;");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $isLogado = array_filter($users, function($user) use ($datas) {
        return ($datas->email === $user['email'] && $datas->password === $user['senha']);
    });

    if($isLogado) {
        echo "O usuário está logado";
    } else {
        echo "O usuário não está logado";
    }


   

    
