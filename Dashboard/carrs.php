<?php

require_once '../database/db.php';
require_once '../database/config.php';
require_once '../database/App/models/veiculos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();

    if ($_POST['action'] === 'addVehicle') {
        $idCliente = $_POST['id_cliente'];
        $idMarca = $_POST['id_marca'];
        $idModelo = $_POST['id_modelo'];
        $matricula = $_POST['matricula'];
        $km = $_POST['km'];
        $obs = $_POST['obs'];

        addCarrs($db, $idCliente, $idMarca, $idModelo, $matricula, $km, $obs);
    } elseif ($_POST['action'] === 'editVehicle') {
        $id = $_POST['id'];
        $idCliente = $_POST['id_cliente'];
        $idMarca = $_POST['id_marca'];
        $idModelo = $_POST['id_modelo'];
        $matricula = $_POST['matricula'];
        $km = $_POST['km'];
        $obs = $_POST['obs'];

        editCarrs($db, $id, $idCliente, $idMarca, $idModelo, $matricula, $km, $obs);
    } elseif ($_POST['action'] === 'deleteVehicle') {
        $id = $_POST['id'];
        deleteCarrs($db, $id);
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
    <title>MacDash - Gestão de Veículos</title>
    <link rel="stylesheet" href="./src/css/dash.css">
    <link rel="stylesheet" href="./src/css/cars.css">
    <script src="./src/js/navDash.js" defer></script>
    <script src="/assets/js/vehicles_dash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

<header>
    <?php include '../Templates/dash/navBar.php'; ?>
</header>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <br>
    <br>
    <div class="button-container">
        <button id="addVehicleBtn" class="btn-btn-add">Adicionar Veículo</button>
    </div>
    <div class="dash-content">
        <?php
        $db = new DB();
        getCarrs($db);
        ?>
    </div> 
</section>
<div id="addVehicleModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addVehicleModal')">&times;</span>
        <h2>Adicionar Veículo</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addVehicle">
            <label for="vehicleCliente">Cliente:</label>
            <select id="vehicleCliente" name="id_cliente" required>
                <option value="">Selecione um cliente</option>
                <?php
                $sqlClientes = "SELECT id_Cliente, Nome_Cliente FROM cliente";
                $rClientes = $db->send2db($sqlClientes);
                while ($rowCliente = $rClientes->fetch_assoc()) {
                    echo '<option value="' . $rowCliente['id_Cliente'] . '">' . htmlspecialchars($rowCliente['Nome_Cliente']) . '</option>';
                }
                ?>
            </select>
            <label for="vehicleMarca">Marca:</label>
            <select id="vehicleMarca" name="id_marca" required>
                <option value="">Selecione uma marca</option>
                <?php
                $sqlMarcas = "SELECT id_Marca, Nome_Marca FROM marca";
                $rMarcas = $db->send2db($sqlMarcas);
                while ($rowMarca = $rMarcas->fetch_assoc()) {
                    echo '<option value="' . $rowMarca['id_Marca'] . '">' . htmlspecialchars($rowMarca['Nome_Marca']) . '</option>';
                }
                ?>
            </select>
            <label for="vehicleModelo">Modelo:</label>
            <select id="vehicleModelo" name="id_modelo" required>
                <option value="">Selecione um modelo</option>
                <?php
                $sqlModelos = "SELECT id_Modelo, Nome_Modelo FROM modelo";
                $rModelos = $db->send2db($sqlModelos);
                while ($rowModelo = $rModelos->fetch_assoc()) {
                    echo '<option value="' . $rowModelo['id_Modelo'] . '">' . htmlspecialchars($rowModelo['Nome_Modelo']) . '</option>';
                }
                ?>
            </select>
            <label for="vehicleMatricula">Matrícula:</label>
            <input type="text" id="vehicleMatricula" name="matricula" required>
            <label for="vehicleKm">Quilometragem:</label>
            <input type="number" id="vehicleKm" name="km" required>
            <label for="vehicleObs">Observações:</label>
            <textarea id="vehicleObs" name="obs"></textarea>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>

<div id="editVehicleModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editVehicleModal')">&times;</span>
        <h2>Editar Veículo</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="editVehicle">
            <input type="hidden" name="id" id="editVehicleId">
            <label for="editVehicleCliente">Cliente:</label>
            <select id="editVehicleCliente" name="id_cliente" required>
                <option value="">Selecione um cliente</option>
                <?php
                $sqlClientes = "SELECT id_Cliente, Nome_Cliente FROM cliente";
                $rClientes = $db->send2db($sqlClientes);
                while ($rowCliente = $rClientes->fetch_assoc()) {
                    echo '<option value="' . $rowCliente['id_Cliente'] . '">' . htmlspecialchars($rowCliente['Nome_Cliente']) . '</option>';
                }
                ?>
            </select>
            <label for="editVehicleMarca">Marca:</label>
            <select id="editVehicleMarca" name="id_marca" required>
                <option value="">Selecione uma marca</option>
                <?php
                $sqlMarcas = "SELECT id_Marca, Nome_Marca FROM marca";
                $rMarcas = $db->send2db($sqlMarcas);
                while ($rowMarca = $rMarcas->fetch_assoc()) {
                    echo '<option value="' . $rowMarca['id_Marca'] . '">' . htmlspecialchars($rowMarca['Nome_Marca']) . '</option>';
                }
                ?>
            </select>
            <label for="editVehicleModelo">Modelo:</label>
            <select id="editVehicleModelo" name="id_modelo" required>
                <option value="">Selecione um modelo</option>
                <?php
                $sqlModelos = "SELECT id_Modelo, Nome_Modelo FROM modelo";
                $rModelos = $db->send2db($sqlModelos);
                while ($rowModelo = $rModelos->fetch_assoc()) {
                    echo '<option value="' . $rowModelo['id_Modelo'] . '">' . htmlspecialchars($rowModelo['Nome_Modelo']) . '</option>';
                }
                ?>
            </select>
            <label for="editVehicleMatricula">Matrícula:</label>
            <input type="text" id="editVehicleMatricula" name="matricula" required>
            <label for="editVehicleKm">Quilometragem:</label>
            <input type="number" id="editVehicleKm" name="km" required>
            <label for="editVehicleObs">Observações:</label>
            <textarea id="editVehicleObs" name="obs"></textarea>
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>
</div>
<script>
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

document.getElementById('addVehicleBtn').onclick = function() {
    document.getElementById('addVehicleModal').style.display = 'block';
};

function openEditVehicleModal(id, marca, modelo, matricula, km, obs) {
    document.getElementById('editVehicleId').value = id;
    document.getElementById('editVehicleMarca').value = marca;
    document.getElementById('editVehicleModelo').value = modelo;
    document.getElementById('editVehicleMatricula').value = matricula;
    document.getElementById('editVehicleKm').value = km;
    document.getElementById('editVehicleObs').value = obs;
    document.getElementById('editVehicleModal').style.display = 'block';
}
</script>

<script src="./src/js/cars.js"></script>
</body>
</html>