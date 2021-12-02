<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nasc = $_POST['data_nasc'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $cidade_id = $_POST['cidade'];

        $sqlUpdate = "INSERT INTO vendedor(nome,email,telefone,data_nasc,sexo,endereco,cidade_id) 
        VALUES ('$nome','$email','$telefone','$data_nasc','$sexo','$endereco','$cidade_id')";

        $conexao->query($sqlUpdate);
    }
    header('Location: vendedor.php');
    
?>