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

    if(!empty($datas)) {
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("INSERT INTO users (nome, email, senha) VALUES (:name, :email, :password)");
            $stmt->execute([
                ':name' => $datas->name,
                ':email' => $datas->email,
                ':password' => $datas->password
            ]);
            $pdo->commit(); //Salva as alterações que foram colocadas no banco de dados
            echo "Usuário cadastrado com sucesso ";
        } catch(Exception $e) {
            $pdo->rollback(); //Encerrar tudo se der errado no banco de dados
            echo "Erro ao cadastra: ". $e->getMessage();
        }

    } else {
        echo "Os dados não estão sendo salvo corretamente no back-end para enviar para o banco de dados";
    }
