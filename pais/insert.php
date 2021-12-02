<?php


    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];

        $sqlUpdate = "INSERT INTO pais(nome) VALUES ('$nome')";

        $conexao->query($sqlUpdate);
    }
    header('Location: pais.php');
?>