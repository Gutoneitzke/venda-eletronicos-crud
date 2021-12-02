<?php

    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM produto WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM produto WHERE id=$id";
            $conexao->query($sqlDelete);
        }
    }
    header('Location: produto.php');
?>