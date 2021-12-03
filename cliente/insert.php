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

        $sqlVerification = "SELECT * FROM cliente WHERE email='$email'";
        $resultVerification = $conexao->query($sqlVerification);
        if($resultVerification->num_rows > 0)
        {
            header('Location: cliente.php?error=1');
            return;
        }

        $sqlUpdate = "INSERT INTO cliente(nome,email,telefone,data_nasc,sexo,endereco,cidade_id) 
        VALUES ('$nome','$email','$telefone','$data_nasc','$sexo','$endereco','$cidade_id')";
        $conexao->query($sqlUpdate);
    }
    header('Location: cliente.php');
    
?>