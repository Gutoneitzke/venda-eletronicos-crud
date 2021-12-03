<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id         = $_POST['id'];
        $nome       = $_POST['nome'];
        $descricao  = $_POST['descricao'];
        $valor      = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $vendedor   = $_POST['vendedor'];
        $categoria  = $_POST['categoria'];

        $sqlVerification = "SELECT * FROM produto WHERE nome='$nome'";
        $resultVerification = $conexao->query($sqlVerification);

        if($resultVerification->num_rows > 0)
        {
            header('Location: produto.php?error=1');
            return;
        }

        $sqlSelect = "SELECT *  FROM produto WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlUpdate = "UPDATE produto SET nome='$nome',descricao='$descricao',valor='$valor',quantidade='$quantidade',vendedor_id='$vendedor',categoria_id='$categoria' WHERE id=$id";

            $conexao->query($sqlUpdate);
        }
    }
    header('Location: produto.php');

?>