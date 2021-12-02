<?php

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $id          = $_POST['id'];
        $data        = $_POST['data'];
        $vendedor    = $_POST['vendedor'];
        $cliente     = $_POST['cliente'];
        $produtos    = $_POST['produto'];
        $quantidade  = 1;
        
        $sqlUpdateVenda = "UPDATE venda SET data='$data',vendedor_id='$vendedor',cliente_id='$cliente' WHERE id='$id'";
        $conexao->query($sqlUpdateVenda);

        $sqlDeleteProdutoHasVenda = "DELETE FROM produto_has_venda WHERE venda_id=$id";
        $resultDelete = $conexao->query($sqlDeleteProdutoHasVenda);

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

            // não existe -> create
            $sqlUpdateProdutoHasVenda = "INSERT INTO produto_has_venda(produto_id,venda_id,quantidade,preco_venda) VALUES ('$produtos[$i]','$id','$quantidade','$preco_venda')";
            $conexao->query($sqlUpdateProdutoHasVenda);
        }
    }
    header('Location: venda.php');

?>
