<?php
require '../database/App/Func/funcs.php';
require '../database/App/models/clientes.php';
require '../database/App/models/marcacao.php';
require '../database/App/models/veiculos.php';
require_once '../database/db.php';
require '../database/config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ./public/index.php');
    exit;
}

// Inicializa a conexão com o banco de dados
$db = new db;

// Obtém as marcações do dia
$appointments = getMarcacoesDoDia($db);
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="./src/js/navDash.js" defer></script>
    <title>MyDash - Gestão</title>
</head>
<body>
<header>
    <?php include '../Templates/dash/navBar.php' ?>
</header>
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <br>
    <div class="welcome-message">
        <br>
        <h2>Bem-vindo ao MyDash</h2>
        <p>Algumas estatísticas do seu negocio</p>
    </div>

    <!-- Cards de Estatísticas e Tabela -->
    <div class="dashboard-content">
        <!-- Cards -->
        <div class="cards-container">
            <div class="card">
                <i class="uil uil-shopping-cart-alt"></i>
                <h3>Total de Clientes</h3>
                <p><?php 
                    $totalClientes = CountallClients($db);
                    echo $totalClientes;
                 ?></p>
            </div>
            <div class="card">
                <i class="uil uil-users-alt"></i>
                <h3>Total de Marcações</h3>
                <p><?php
                $totalMarcs = CountallMarcs($db);
                 echo $totalMarcs; ?></p>
            </div>
            <div class="card">
                <i class="uil uil-comments"></i>
                <h3>Total de Veículos</h3>
                <p><?php 
                $totalVeiculos = CountallCarrs($db);
                echo $totalVeiculos; ?></p>
            </div>
        </div>

        <!-- Tabela de Marcações -->
        <div class="daily-appointments">
            <h3>Marcações do Dia</h3>
            <?php
            if (!empty($appointments)) {
                echo '<table class="appointments-table">';
                echo '<thead><tr><th>ID</th><th>Veículo</th><th>Serviço</th><th>Hora</th></tr></thead>';
                echo '<tbody>';
                foreach ($appointments as $appointment) {
                    echo '<tr>';
                    echo '<td>' . $appointment['id_Marcacao'] . '</td>';
                    echo '<td>' . $appointment['Veiculo'] . '</td>';
                    echo '<td>' . $appointment['TipoMarcacao'] . '</td>';
                    echo '<td>' . date('H:i', strtotime($appointment['Data_Marc'])) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Não há marcações para hoje.</p>';
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>