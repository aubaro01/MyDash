<?php
require_once '../database/db.php';
require_once '../database/config.php';
require_once '../database/App/models/clientes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();

    if ($_POST['action'] === 'edit') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $nif = $_POST['nif'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $observacoes = $_POST['observacoes'];

        editClients($db, $id, $nome, $nif, $telefone, $email, $observacoes);
    } elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        deleteClients($db, $id);
    } elseif ($_POST['action'] === 'add') {
        $nome = $_POST['nome'];
        $nif = $_POST['nif'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $observacoes = $_POST['observacoes'];

        addClients($db, $nome, $nif, $telefone, $email, $observacoes);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacDash - Gestão de Clientes</title>
    <link rel="stylesheet" href="./src/css/dash.css">
    <link rel="stylesheet" href="./src/css/clients.css">
    <script src="./src/js/navDash.js" defer></script>
    <script src="./src/js/navBar.js" defer></script>
    <script src="/assets/js/clients_dash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<header>
    <?php include '../Templates/dash/navBar.php'?>
</header>
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <br>
    <br>
    <div class="button-container">
        <button id="addClientBtn" class="btn-btn-add">Adicionar Cliente</button>
    </div>
    <div class="dash-content">
        <?php
        $db = new DB();
        getClients($db);
        ?>
    </div> 
</section>

<!-- Modal para Adicionar Cliente -->
<div id="addClientModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addClientModal')">&times;</span>
        <h2>Adicionar Cliente</h2>
        <form method="post">
            <input type="hidden" name="action" value="add">
            <label for="clientName">Nome:</label>
            <input type="text" id="clientName" name="nome" required>
            <label for="clientNif">NIF:</label>
            <input type="text" id="clientNif" name="nif" required>
            <label for="clientPhone">Telefone:</label>
            <input type="text" id="clientPhone" name="telefone" required>
            <label for="clientEmail">Email:</label>
            <input type="email" id="clientEmail" name="email" required>
            <label for="clientObservations">Observações:</label>
            <textarea id="clientObservations" name="observacoes"></textarea>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>

<!-- Modal para Editar Cliente -->
<div id="editClientModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editClientModal')">&times;</span>
        <h2>Editar Cliente</h2>
        <form method="post">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="editClientId">
            <label for="editClientName">Nome:</label>
            <input type="text" id="editClientName" name="nome" required>
            <label for="editClientNif">NIF:</label>
            <input type="text" id="editClientNif" name="nif" required>
            <label for="editClientPhone">Telefone:</label>
            <input type="text" id="editClientPhone" name="telefone" required>
            <label for="editClientEmail">Email:</label>
            <input type="email" id="editClientEmail" name="email" required>
            <label for="editClientObservations">Observações:</label>
            <textarea id="editClientObservations" name="observacoes"></textarea>
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

document.getElementById('addClientBtn').onclick = function() {
    document.getElementById('addClientModal').style.display = 'block';
};

function openEditModal(id, nome, nif, telefone, email, observacoes) {
    document.getElementById('editClientId').value = id;
    document.getElementById('editClientName').value = nome;
    document.getElementById('editClientNif').value = nif;
    document.getElementById('editClientPhone').value = telefone;
    document.getElementById('editClientEmail').value = email;
    document.getElementById('editClientObservations').value = observacoes;
    document.getElementById('editClientModal').style.display = 'block';
}
</script>
</body>
</html>