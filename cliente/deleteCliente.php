<?php

    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM cliente WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM cliente WHERE id=$id";
            $conexao->query($sqlDelete);
        }
    }
    header('Location: cliente.php');
?>