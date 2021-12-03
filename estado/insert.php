<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome    = $_POST['nome'];
        $pais_id = $_POST['pais'];

        $sqlSelect = "SELECT * FROM estado WHERE nome='$nome' and pais_id='$pais_id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: estado.php?error=1');
            return;
        }

        $sqlUpdate = "INSERT INTO estado(nome,pais_id) VALUES ('$nome','$pais_id')";

        $conexao->query($sqlUpdate);
    }
    header('Location: estado.php');
    
?>