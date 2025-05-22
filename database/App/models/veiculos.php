<?php

function addCarrs($db, $idC, $idM, $idMod, $matricula, $km, $obs) {
    $sql = "INSERT INTO veiculo (id_Cliente, id_Marca, id_Modelo, Matricula_veiculo, Km_veiculo, obs) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->send2db($sql, [$idC, $idM, $idMod, $matricula, $km, $obs]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de inserção.');
    }

    return $stmt;
}


function editCarrs($db, $id, $idCliente, $idMarca, $idModelo, $matricula, $km, $obs) {
    $sql = "UPDATE veiculo SET id_Cliente=?, id_Marca=?, id_Modelo=?, Matricula_veiculo=?, Km_veiculo=?, obs=? WHERE id_Veiculo=?";
    $stmt = $db->send2db($sql, [$idCliente, $idMarca, $idModelo, $matricula, $km, $obs, $id]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de edição.');
    }

    return $stmt;
}


function deleteCarrs($db, $id) {
    $sql = "DELETE FROM veiculo WHERE id_Veiculo=?";
    $stmt = $db->send2db($sql, [$id]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de exclusão.');
    }

    return $stmt;
}


function CountallCarrs($db) {
    $sql = "SELECT COUNT(*) AS Total_Veiculos FROM veiculo";
    $result = $db->send2db($sql);

    if ($result === false) {
        die('Erro ao executar a consulta de contagem de veículos.');
    }

    $row = $result->fetch_assoc();
    return $row['Total_Veiculos'];
}


function getCarrs($db) {
    $sql = "
        SELECT 
            v.id_Veiculo, 
            c.Nome_Cliente AS Cliente, 
            m.Nome_Marca AS Marca, 
            mo.Nome_Modelo AS Modelo, 
            v.Matricula_veiculo AS Matricula, 
            v.Km_veiculo AS Km, 
            v.obs AS Observacoes
        FROM veiculo v
        INNER JOIN cliente c ON v.id_Cliente = c.id_Cliente
        INNER JOIN marca m ON v.id_Marca = m.id_Marca
        INNER JOIN modelo mo ON v.id_Modelo = mo.id_Modelo
    ";
    $r = $db->send2db($sql);

    if ($r->num_rows > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-hover">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Cliente</th>';
        echo '<th scope="col">Marca</th>';
        echo '<th scope="col">Modelo</th>';
        echo '<th scope="col">Matrícula</th>';
        echo '<th scope="col">Quilometragem</th>';
        echo '<th scope="col">Observações</th>';
        echo '<th scope="col">Ações</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $r->fetch_assoc()) {
            $veiculoId = $row['id_Veiculo'];
            $clienteNome = htmlspecialchars($row['Cliente'], ENT_QUOTES);
            $marcaNome = htmlspecialchars($row['Marca'], ENT_QUOTES);
            $modeloNome = htmlspecialchars($row['Modelo'], ENT_QUOTES);
            $matricula = htmlspecialchars($row['Matricula'], ENT_QUOTES);
            $km = htmlspecialchars($row['Km'], ENT_QUOTES);
            $observacoes = htmlspecialchars($row['Observacoes'], ENT_QUOTES);

            echo '<tr>';
            echo '<th scope="row">' . $veiculoId . '</th>';
            echo '<td>' . $clienteNome . '</td>';
            echo '<td>' . $marcaNome . '</td>';
            echo '<td>' . $modeloNome . '</td>';
            echo '<td>' . $matricula . '</td>';
            echo '<td>' . $km . '</td>';
            echo '<td>' . $observacoes . '</td>';
            echo '<td>';
            echo '<button type="button" class="btn-edit" onclick="openEditVehicleModal(' . $veiculoId . ', \'' . addslashes($marcaNome) . '\', \'' . addslashes($modeloNome) . '\', \'' . addslashes($matricula) . '\', \'' . addslashes($km) . '\', \'' . addslashes($observacoes) . '\')"><i class="uil uil-edit"></i> Editar</button>';
            echo '<form method="post" style="display:inline-block; margin-left: 5px;">';
            echo '<input type="hidden" name="action" value="deleteVehicle">';
            echo '<input type="hidden" name="id" value="' . $veiculoId . '">';
            echo '<button type="submit" class="btn-delete"><i class="uil uil-trash-alt"></i> Excluir</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-muted">Nenhum veículo encontrado.</p>';
    }
}