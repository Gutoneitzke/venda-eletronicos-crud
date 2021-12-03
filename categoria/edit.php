<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');
        
        $id   = $_POST['id'];
        $nome = $_POST['nome'];
        
        $sqlVerification = "SELECT * FROM categoria WHERE nome='$nome'";
        
        $resultVerification = $conexao->query($sqlVerification);
        
        if($resultVerification->num_rows > 0)
        {
            header('Location: categoria.php?error=1');
            return;
        }
        
        $sqlSelect = "SELECT * FROM categoria WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE categoria SET nome='$nome' WHERE id=$id";
            $conexao->query($sqlUpdate);
        }
    }
    header('Location: categoria.php');

?>