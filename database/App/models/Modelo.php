<?php 

function addModelo($db, $id_Marca, $nomeModelo ){

    $sql = "INSERT INTO modelo (id_Marca, Nome_modelo) Values (?,?)";
    $stmt = $db->send2db($sql, [$id_Marca, $nomeModelo]);

    if ($stmt === False){
        die("Erro ao adiocionar Modelo");
    }

    return $stmt;

}

function editModelo($db, $id, $id_Marca, $nomeModelo){
    $sql = "UPDATE modelo set id_Marca=?, Nome_modelo=? where id_Modelo=?";
    $stmt = $db->send2db($sql,[$id, $id_Marca, $nomeModelo]);

    if ($stmt === false){
        die("Erro ao editar modelo");
    }

    return $stmt;
}

function deleteModelo($db, $id){
    $sql = "DELETE From modelo where id_Modelo=?";
    $stmt = $db->send2db($sql, [$id]);

    if ($stmt === False){
        die("Erro ao excluir modelo");
    }

    return $stmt;
}

Function AllModelos($db){
    $sql = "SELECT * from modelo";
    $stmt = $db->send2db($sql);

    if ($stmt === false){
        die("Erro ao mostrar todos os modelos");
    }
    return $stmt;

}