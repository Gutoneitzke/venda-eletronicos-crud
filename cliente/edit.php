<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id   = $_POST['id'];
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
        $sqlSelect = "SELECT *  FROM cliente WHERE id=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE cliente SET nome='$nome',email='$email',telefone='$telefone',data_nasc='$data_nasc',sexo='$sexo',endereco='$endereco',cidade_id='$cidade_id' WHERE id=$id";

            $conexao->query($sqlUpdate);
        } 
    }
    header('Location: cliente.php');

?>