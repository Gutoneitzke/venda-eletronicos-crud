<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id        = $_POST['id'];
        $nome      = $_POST['nome'];
        $estado_id = $_POST['estado'];

        $sqlSelect = "SELECT * FROM cidade WHERE nome='$nome' and estado_id='$estado_id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: cidade.php?error=1');
            return;
        }

        $sqlSelect = "SELECT *  FROM cidade WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE cidade SET nome='$nome',estado_id='$estado_id' WHERE id=$id";

            $conexao->query($sqlUpdate);
        }
    }
    header('Location: cidade.php');
?>