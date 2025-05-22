<?php
require '../database/db.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);


    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }


    $db = new DB(); 
    $sql = "INSERT INTO contactos (nome, email, mensagem) VALUES (?, ?, ?)";
    $args = [$nome, $email, $mensagem];

    if ($db->send2db($sql, $args)) {
        
        header('Location: thanks.php');
        exit;
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>