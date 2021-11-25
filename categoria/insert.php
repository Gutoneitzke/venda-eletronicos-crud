<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id   = $_POST['id'];
        $nome = $_POST['nome'];

        $sqlSelect = "SELECT *  FROM categoria WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE categoria SET nome='$nome' WHERE id=$id";

            $conexao->query($sqlUpdate);
        }
    }
    header('Location: categoria.php');
?>