<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $data        = $_POST['data'];
        $vendedor    = $_POST['vendedor'];
        $cliente     = $_POST['cliente'];
        $produtos    = $_POST['produto'];
        $quantidade  = 1;
        
        $sqlInsertVenda = "INSERT INTO venda(data,vendedor_id,cliente_id) VALUES ('$data','$vendedor','$cliente')";
        $conexao->query($sqlInsertVenda);
        $venda_id = $conexao->insert_id;

        for($i = 0; $i < count($produtos); $i++)
        {
            $sqlSelect = "SELECT * FROM produto WHERE id=$produtos[$i]";
            $result = $conexao->query($sqlSelect);
            if($result->num_rows > 0)
            {
                while($user_data = mysqli_fetch_assoc($result))
                {
                    $preco_venda = $user_data['valor'];
                }
            }

            $sqlInsertProdutoHasVenda = "INSERT INTO produto_has_venda(produto_id,venda_id,quantidade,preco_venda) VALUES ('$produtos[$i]','$venda_id','$quantidade','$preco_venda')";
            $conexao->query($sqlInsertProdutoHasVenda);
        }
    }
    header('Location: venda.php');
    
?>