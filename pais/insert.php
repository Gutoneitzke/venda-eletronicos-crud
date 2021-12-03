<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];

        $sqlSelect = "SELECT * FROM pais WHERE nome='$nome'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: pais.php?error=1');
            return;
        }

        $sqlUpdate = "INSERT INTO pais(nome) VALUES ('$nome')";

        $conexao->query($sqlUpdate);
    }
    header('Location: pais.php');
?>