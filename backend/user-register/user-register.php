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

    $data = json_decode(file_get_contents("php://input"), true);

    if(!empty($data['name']) && !empty($data['email']) && !empty($data['password'])) {

        try {
            $check = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");

            if($check->fetchColumn() > 0) {
                echo "Este email já esta cadastrado";
                exit;
            }

            $stmt = $pdo->prepare("
                INSERT INTO users (nome, email, senha) 
                VALUES (:nome, :email, :senha)
            ");
            $stmt->execute([
                ':nome' => $data['name'],
                ':email' => $data['email'],
                ':senha' => $data['password']
            ]);

            echo "Usuário cadastrado com sucesso";
        } catch(error) {
            echo "Usuário não cadastro por: ", error;
        }
    }
    
   