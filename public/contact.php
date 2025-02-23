<?php
require '../database/db.php'; // Certifique-se de que o caminho está correto

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Validação básica
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Salva os dados na base de dados
    $db = new DB(); // Inicializa a conexão com o banco de dados
    $sql = "INSERT INTO contactos (nome, email, mensagem) VALUES (?, ?, ?)";
    $args = [$nome, $email, $mensagem];

    if ($db->send2db($sql, $args)) {
        // Redireciona para a página de agradecimento
        header('Location: thanks.php');
        exit;
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>