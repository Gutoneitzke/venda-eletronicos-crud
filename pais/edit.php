<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id   = $_POST['id'];
        $nome = $_POST['nome'];

        $sqlSelect = "SELECT * FROM pais WHERE nome='$nome'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: pais.php?error=1');
            return;
        }

        $sqlSelect = "SELECT *  FROM pais WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE pais SET nome='$nome' WHERE id=$id";

            $conexao->query($sqlUpdate);
        }
    }
    header('Location: pais.php');
?>