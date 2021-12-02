<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $pais_id = $_POST['pais'];

        $sqlUpdate = "INSERT INTO estado(nome,pais_id) VALUES ('$nome','$pais_id')";

        $conexao->query($sqlUpdate);
    }
    header('Location: estado.php');
    
?>