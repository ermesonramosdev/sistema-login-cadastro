<?php
    require_once("../conexao.php");

    $sql = "SELECT id, nome, email, senha FROM users";
    $stmf = $pdo->prepare($sql);
    $stmf->execute();

    $users = $stmf->fetchAll(PDO::FETCH_ASSOC);

    foreach($users as $user) {
        echo "ID: ". $user['id'] . "<br>";
        echo "Nome: ". $user['nome'] . "<br>";
        echo "Email: ". $user['email'] . "<br>";
        echo "Senha: ". $user['senha'] . "<br>";
        echo "<hr>";
    }
