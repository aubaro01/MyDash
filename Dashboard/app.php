<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baixar o Nosso Aplicativo</title>
    <script src="./src/js/navDash.js" defer></script>
    <script src="/assets/js/clients_dash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./src/css/app.css">
    <link rel="stylesheet" href="./src/css/dash.css">
    <script src="/assets/js/navDash.js" defer></script>
</head>
<body>
<header>
    <?php include '../Templates/dash/navBar.php' ?> 
</header>
<section class="main-content">
<div class="container">
    <h1 class="section-header">Bem-vindo ao Nosso Aplicativo!</h1>
    <p class="text-center">Descubra como nosso aplicativo pode facilitar o seu dia a dia!</p>

    <div class="app-description">
        <div class="col-md-6">
            <h2>O que é o nosso aplicativo?</h2>
            <p>O nosso aplicativo oferece uma maneira simples e eficiente de gerenciar tarefas diárias, com funcionalidades como listas de tarefas, notificações e sincronização em tempo real. Ele foi projetado para ser intuitivo e fácil de usar, seja você um usuário iniciante ou avançado.</p>
            <p>Com o nosso app, você pode gerenciar sua produtividade, controlar suas metas e até mesmo compartilhar suas tarefas com amigos ou colegas de trabalho.</p>
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" alt="Imagem do aplicativo" class="img-fluid">
        </div>
    </div>

    <div class="app-details">
        <h3>Funcionalidades principais:</h3>
        <ul>
            <li><i class="uil uil-check-circle"></i><strong>Lista de tarefas:</strong> Crie e gerencie suas tarefas facilmente.</li>
            <li><i class="uil uil-bell"></i><strong>Notificações:</strong> Receba alertas para não esquecer de nada.</li>
            <li><i class="uil uil-sync"></i><strong>Sincronização em tempo real:</strong> Acesse seus dados de qualquer lugar.</li>
            <li><i class="uil uil-smile"></i><strong>Interface amigável:</strong> Design simples e intuitivo para todos os tipos de usuário.</li>
        </ul>
    </div>

    <div class="text-center my-4">
        <img src="/public/assets/img/dash.png" alt="Tela do aplicativo" class="img-fluid">
    </div>

    <div class="text-center">
        <a href="path-to-your-app-download-file.exe" class="btn btn-primary download-btn">Baixar Agora</a>
    </div>

    <div class="app-details mt-4">
        <h3>Instruções para instalar:</h3>
        <p>1. Clique no botão "Baixar Agora" para iniciar o download do aplicativo.</p>
        <p>2. Após o download, abra o arquivo e siga as instruções do instalador.</p>
        <p>3. Quando a instalação terminar, abra o aplicativo e comece a usá-lo!</p>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>