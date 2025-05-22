<?php 

function addMarcacao($db, $idVeiculo, $idTipoMarc, $dataMarc, $estado, $obs) {
    $sql = "INSERT INTO marcacao (id_veiculo, id_TipoMarc, Data_Marc, Estado, obs) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->send2db($sql, [$idVeiculo, $idTipoMarc, $dataMarc, $estado, $obs]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de inserção.');
    }

    return $stmt;
}

function editMarcacao($db, $id, $idVeiculo, $idTipoMarc, $dataMarc, $estado, $obs) {
    $sql = "UPDATE marcacao SET id_veiculo=?, id_TipoMarc=?, Data_Marc=?, Estado=?, obs=? WHERE id_Marcacao=?";
    $stmt = $db->send2db($sql, [$idVeiculo, $idTipoMarc, $dataMarc, $estado, $obs, $id]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de edição.');
    }

    return $stmt;
}

function deleteMarcacao($db, $id) {
    $sql = "DELETE FROM marcacao WHERE id_Marcacao=?";
    $stmt = $db->send2db($sql, [$id]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de exclusão.');
    }

    return $stmt;
}

function CountallMarcs($db) {
    $sql = "SELECT COUNT(*) AS Total_Marcacoes FROM marcacao";
    $result = $db->send2db($sql);

    if ($result === false) {
        die('Erro ao executar a consulta de contagem de marcações.');
    }

    $row = $result->fetch_assoc();
    return $row['Total_Marcacoes'];
}

function getMarcacoes($db) {
    $sql = "
        SELECT 
            m.id_Marcacao, 
            v.Matricula_veiculo AS Veiculo, 
            t.Marcacao AS TipoMarcacao, 
            m.Data_Marc, 
            m.Estado, 
            m.obs AS Observacoes
        FROM marcacao m
        INNER JOIN veiculo v ON m.id_veiculo = v.id_Veiculo
        INNER JOIN tipomarcacao t ON m.id_TipoMarc = t.id_TipoMarc
    ";
    $r = $db->send2db($sql);

    if ($r->num_rows > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-hover">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Veículo</th>';
        echo '<th scope="col">Tipo de Marcação</th>';
        echo '<th scope="col">Data e Hora</th>';
        echo '<th scope="col">Estado</th>';
        echo '<th scope="col">Observações</th>';
        echo '<th scope="col">Ações</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $r->fetch_assoc()) {
            $marcacaoId = $row['id_Marcacao'];
            $veiculo = htmlspecialchars($row['Veiculo'], ENT_QUOTES);
            $tipoMarcacao = htmlspecialchars($row['TipoMarcacao'], ENT_QUOTES);
            $dataMarc = htmlspecialchars($row['Data_Marc'], ENT_QUOTES);
            $estado = htmlspecialchars($row['Estado'], ENT_QUOTES);
            $observacoes = htmlspecialchars($row['Observacoes'], ENT_QUOTES);

            echo '<tr>';
            echo '<th scope="row">' . $marcacaoId . '</th>';
            echo '<td>' . $veiculo . '</td>';
            echo '<td>' . $tipoMarcacao . '</td>';
            echo '<td>' . $dataMarc . '</td>';
            echo '<td>' . $estado . '</td>';
            echo '<td>' . $observacoes . '</td>';
            echo '<td>';
            echo '<button type="button" class="btn-edit" onclick="openEditMarcacaoModal(' . $marcacaoId . ', \'' . addslashes($veiculo) . '\', \'' . addslashes($tipoMarcacao) . '\', \'' . addslashes($dataMarc) . '\', \'' . addslashes($estado) . '\', \'' . addslashes($observacoes) . '\')"><i class="uil uil-edit"></i> Editar</button>';
            echo '<form method="post" style="display:inline-block; margin-left: 5px;">';
            echo '<input type="hidden" name="action" value="deleteMarcacao">';
            echo '<input type="hidden" name="id" value="' . $marcacaoId . '">';
            echo '<button type="submit" class="btn-delete"><i class="uil uil-trash-alt"></i> Excluir</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-muted">Nenhuma marcação encontrada.</p>';
    }
}
function getMarcacoesDoDia($db) {
   
    $dataAtual = date('Y-m-d');
    $sql = "
        SELECT 
            m.id_Marcacao, 
            v.Matricula_veiculo AS Veiculo, 
            t.Marcacao AS TipoMarcacao, 
            m.Data_Marc, 
            m.Estado, 
            m.obs AS Observacoes
        FROM marcacao m
        INNER JOIN veiculo v ON m.id_veiculo = v.id_Veiculo
        INNER JOIN tipomarcacao t ON m.id_TipoMarc = t.id_TipoMarc
        WHERE DATE(m.Data_Marc) = ?
    ";
    $stmt = $db->send2db($sql, [$dataAtual]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de marcações do dia.');
    }

    $marcacoes = [];
    if ($stmt->num_rows > 0) {
        while ($row = $stmt->fetch_assoc()) {
            $marcacoes[] = $row;
        }
    }

    return $marcacoes;
}