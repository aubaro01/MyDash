<?php

function addMarca($db, $nomeMarca){
    $sql = "INSERT INTO marca (Nome_Marca) VALUES (?)";
    $stmt = $db->send2db($sql, [$nomeMarca]);

    if($stmt === False){
        die("Erro ao adicionar Marca");

    }

    return $stmt;
}

function delete($db, $id){
    $sql = "DELETE from marca where id_Marca=?";
    $stmt = $db->send2db($sql, [$id]);

    if( $stmt === False){
        die("Erro ao excluir Marca");
    }

    return $stmt;
}

function editMarca($db, $id, $nomeMarca){
    $sql = "UPDATE marca set Nome_Marca=? where id_Marca=?";
    $stmt = $db->send2db($sql,[$id, $nomeMarca]);

    if ($stmt === false){
        die("Erro ao editar Marca");
    }

    return $stmt;

}


function AllMarcas($db){
    $sql = "SELECT * From marca";
    $stmt = $db->send2db($sql);

    if ($stmt === false){
        die("Erro ao Selecionar todas as Marcas");
    }

    return $stmt;
}