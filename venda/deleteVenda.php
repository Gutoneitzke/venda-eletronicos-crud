<?php

    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $venda_id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM venda WHERE id=$venda_id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDeleteProdutosVenda = "DELETE FROM produto_has_venda WHERE venda_id=$venda_id";
            $conexao->query($sqlDeleteProdutosVenda);
            $sqlDeleteVenda = "DELETE FROM venda WHERE id=$venda_id";
            $conexao->query($sqlDeleteVenda);
        }
    }
    header('Location: venda.php');
?>