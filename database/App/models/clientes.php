<?php 


function addClients($db, $Nome, $descricao, $img) {
    $sql = "INSERT INTO serviços (Nome_serviço, descricao_serviço, img_serviço) VALUES (?, ?, ?)";
    $stmt = $db->send2db($sql, [$Nome, $descricao, $img]);


    if ($stmt === false) {
        die('Erro ao executar a consulta de adição.');
    }

    return $stmt;
}

function editClients($db, $id, $nome, $descricao, $img) {
    $sql = "UPDATE serviços SET  Nome_serviço=?, descricao_serviço=?, img_serviço=? WHERE Serviço_id=?";
    $stmt = $db->send2db($sql, [$nome, $descricao, $img, $id]);


    if ($stmt === false) {
        die('Erro ao executar a consulta de edição.');
    }

    return $stmt;
}

function deleteClients($db, $id) {
    $sql = "DELETE FROM serviços WHERE Serviço_id=?";
    $stmt = $db->send2db($sql, [$id]);

    if ($stmt === false) {
        die('Erro ao executar a consulta de exclusão.');
    }

    return $stmt;
}

function CountallClients($db){
    $sql = "SELECT COUNT(*) AS Total_Clientes FROM cliente";
    $result = $db->send2db($sql);

    if ($result === false) {
        die('Erro ao executar a consulta de contagem de contactos.');
    }

    $row = $result->fetch_assoc();
    return $row['Total_Clientes'];
}

function getClients($db) {
    $sql = "SELECT id_Cliente, Nome_Cliente, Contacto_Cliente, Email_Cliente, NIF, obs FROM cliente";
    $r = $db->send2db($sql);

    if ($r->num_rows > 0) {
        echo '<div class="table-responsive">'; 
        echo '<table class="table table-striped table-hover">'; 
        echo '<thead class="thead-dark">'; 
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nome do Cliente</th>';
        echo '<th scope="col">NIF</th>';
        echo '<th scope="col">Número de Telefone</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Observações</th>';
        echo '<th scope="col">Ações</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $r->fetch_assoc()) {
            $clienteNome = htmlspecialchars($row['Nome_Cliente'], ENT_QUOTES);
            $clienteNif = htmlspecialchars($row['NIF'], ENT_QUOTES);
            $clienteTel = htmlspecialchars($row['Contacto_Cliente'], ENT_QUOTES);
            $clienteEmail = htmlspecialchars($row['Email_Cliente'], ENT_QUOTES);
            $clienteObs = htmlspecialchars($row['obs'], ENT_QUOTES);
            $clienteId = $row['id_Cliente'];

            echo '<tr>';
            echo '<th scope="row">' . $clienteId . '</th>'; 
            echo '<td>' . $clienteNome . '</td>'; 
            echo '<td>' . $clienteNif . '</td>'; 
            echo '<td>' . $clienteTel . '</td>'; 
            echo '<td>' . $clienteEmail . '</td>'; 
            echo '<td>' . $clienteObs . '</td>'; 
            echo '<td>';
            echo '<button type="button" class="btn-edit" onclick="openEditModal(' . $clienteId . ', \'' . addslashes($clienteNome) . '\', \'' . addslashes($clienteNif) . '\', \'' . addslashes($clienteTel) . '\', \'' . addslashes($clienteEmail) . '\', \'' . addslashes($clienteObs) . '\')"><i class="uil uil-edit"></i> Editar</button>'; // Botão de editar
            echo '<form method="post" style="display:inline-block; margin-left: 5px;">';
            echo '<input type="hidden" name="action" value="delete">';
            echo '<input type="hidden" name="id" value="' . $clienteId . '">';
            echo '<button type="submit" class="btn-delete"><i class="uil uil-trash-alt"></i> Excluir</button>'; 
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-muted">Nenhum cliente encontrado.</p>';
    }

}