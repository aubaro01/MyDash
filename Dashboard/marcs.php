<?php

require_once '../database/config.php';
require_once '../database/db.php';
require_once '../database/App/models/marcacao.php';



?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacDash - Gestão de Marcações</title>
    <link rel="stylesheet" href="./src/css/dash.css">
    <link rel="stylesheet" href="./src/css/marcs.css">
    <script src="./src/js/navDash.js" defer></script>
    <script src="/assets/js/marcacoes_dash.js" defer></script>
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
        <button id="addMarcacaoBtn" class="btn-btn-add">Adicionar Marcação</button>
    </div>
    <div class="dash-content">
        <?php
        $db = new db();
        getMarcacoes($db);
        ?>
    </div> 
</section>

<div id="addMarcacaoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addMarcacaoModal')">&times;</span>
        <h2>Adicionar Marcação</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addMarcacao">
            <label for="marcacaoVeiculo">Veículo:</label>
            <select id="marcacaoVeiculo" name="id_veiculo" required>
                <option value="">Selecione um veículo</option>
            </select>
            <label for="marcacaoTipo">Tipo de Marcação:</label>
            <select id="marcacaoTipo" name="id_TipoMarc" required>
                <option value="">Selecione um tipo</option>
            </select>
            <label for="marcacaoData">Data e Hora:</label>
            <input type="datetime-local" id="marcacaoData" name="Data_Marc" required>
            <label for="marcacaoEstado">Estado:</label>
            <select id="marcacaoEstado" name="Estado" required>
                <option value="Pendente">Pendente</option>
                <option value="Concluída">Concluída</option>
            </select>
            <label for="marcacaoObs">Observações:</label>
            <textarea id="marcacaoObs" name="obs"></textarea>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>

<div id="editMarcacaoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editMarcacaoModal')">&times;</span>
        <h2>Editar Marcação</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="editMarcacao">
            <input type="hidden" name="id" id="editMarcacaoId">
            <label for="editMarcacaoVeiculo">Veículo:</label>
            <select id="editMarcacaoVeiculo" name="id_veiculo" required>
                <option value="">Selecione um veículo</option>
            </select>
            <label for="editMarcacaoTipo">Tipo de Marcação:</label>
            <select id="editMarcacaoTipo" name="id_TipoMarc" required>
                <option value="">Selecione um tipo</option>
            </select>
            <label for="editMarcacaoData">Data e Hora:</label>
            <input type="datetime-local" id="editMarcacaoData" name="Data_Marc" required>
            <label for="editMarcacaoEstado">Estado:</label>
            <select id="editMarcacaoEstado" name="Estado" required>
                <option value="Pendente">Pendente</option>
                <option value="Concluída">Concluída</option>
            </select>
            <label for="editMarcacaoObs">Observações:</label>
            <textarea id="editMarcacaoObs" name="obs"></textarea>
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>
</div>
<script>
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

document.getElementById('addMarcacaoBtn').onclick = function() {
    document.getElementById('addMarcacaoModal').style.display = 'block';
};

function openEditMarcacaoModal(id, veiculo, tipoMarcacao, dataMarc, estado, obs) {
    document.getElementById('editMarcacaoId').value = id;
    document.getElementById('editMarcacaoVeiculo').value = veiculo;
    document.getElementById('editMarcacaoTipo').value = tipoMarcacao;
    document.getElementById('editMarcacaoData').value = dataMarc;
    document.getElementById('editMarcacaoEstado').value = estado;
    document.getElementById('editMarcacaoObs').value = obs;
    document.getElementById('editMarcacaoModal').style.display = 'block';
}
</script>
</body>
</html>