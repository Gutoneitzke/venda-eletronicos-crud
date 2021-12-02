<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $vendedor = $_POST['vendedor'];
        $categoria = $_POST['categoria'];

        $sqlUpdate = "INSERT INTO produto(nome,descricao,valor,quantidade,vendedor_id,categoria_id) VALUES ('$nome','$descricao','$valor','$quantidade','$vendedor','$categoria')";

        // print_r($sqlUpdate);

        $conexao->query($sqlUpdate);
    }
    header('Location: produto.php');
    
?>