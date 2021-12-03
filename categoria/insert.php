<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];

        $sqlSelect = "SELECT * FROM categoria WHERE nome='$nome'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: categoria.php?error=1');
            return;
        }
        else
        {
            $sqlUpdate = "INSERT INTO categoria(nome) VALUES ('$nome')";
            $conexao->query($sqlUpdate);
        }
    }
    header('Location: categoria.php');
?>