<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id      = $_POST['id'];
        $nome    = $_POST['nome'];
        $pais_id = $_POST['pais'];

        $sqlSelect = "SELECT * FROM estado WHERE nome='$nome' and pais_id='$pais_id'";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            header('Location: estado.php?error=1');
            return;
        }

        $sqlSelect = "SELECT *  FROM estado WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE estado SET nome='$nome',pais_id='$pais_id' WHERE id=$id";

            $conexao->query($sqlUpdate);
        }
    }
    header('Location: estado.php');

?>