<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $estado_id = $_POST['estado'];

        $sqlSelect = "SELECT * FROM cidade WHERE nome='$nome' and estado_id='$estado_id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: cidade.php?error=1');
            return;
        }

        $sqlUpdate = "INSERT INTO cidade(nome,estado_id) VALUES ('$nome','$estado_id')";

        $conexao->query($sqlUpdate);
    }
    header('Location: cidade.php');
?>