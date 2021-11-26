<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $estado_id = $_POST['estado'];

        $sqlUpdate = "INSERT INTO cidade(nome,estado_id) VALUES ('$nome','$estado_id')";

        $conexao->query($sqlUpdate);
    }
    header('Location: cidade.php');
?>