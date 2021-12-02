<?php
    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM venda WHERE id=$id";

        $sqlVendedor = "SELECT * FROM vendedor";
        $sqlCliente = "SELECT * FROM cliente";
        $sqlProduto = "SELECT * FROM produto";
        $sqlProdutosVenda = "SELECT * FROM produto_has_venda WHERE venda_id=$id";

        $resultVendedor      = $conexao->query($sqlVendedor);
        $resultCliente       = $conexao->query($sqlCliente);
        $resultProduto       = $conexao->query($sqlProduto);
        $resultProdutosVenda = $conexao->query($sqlProdutosVenda);
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $data        = $user_data['data'];
                $vendedor_id = $user_data['vendedor_id'];
                $cliente_id  = $user_data['cliente_id'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar registro | UPF</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #836FFF, #00BFFF);
            text-align: center;
            color: #fff;
        }
        .backHome{
            float: left;
        }
        .box-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
        }
        .input-data{
            padding: 7px;
            border-radius: 8px;
            border: none;
            outline: none;
        }
        input[type="submit"]{
            width: 100%;
            background: #87CEFA;
            border: none;
            outline: none;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #00BFFF;
            transition: .8s;
        }
    </style>
</head>
<body>
    <a class="backHome" href="venda.php" title="Voltar">Voltar</a>
    <br><br>
    <div class="box-all">
            <div class="box-title">
                <h1>Venda de eletrônicos</h1>
                <h2>Editar registro - Produtos</h2>
                <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
            </div>
            <div class="box-form">
                <form action="edit.php" method="POST">
                <label for="data">Data:</label>
                    <input type="date" class="input-data" value="<?php echo $data ?>" name="data" id="data" required>
                    <br><br>
                    <label for="vendedor">Selecione o vendedor:</label>
                    <select name="vendedor" id="vendedor" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultVendedor))
                            {?>
                                <option <?php echo ($vendedor_id == $register_data['id'] ? 'selected' : '') ?> value='<?php echo $register_data['id']?>'><?php echo $register_data['nome']?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <br><br>
                    <label for="cliente">Selecione o cliente:</label>
                    <select name="cliente" id="cliente" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultCliente))
                            {?>
                                <option value='<?php echo $register_data['id']?>' <?php echo ($cliente_id == $register_data['id'] ? 'selected' : '') ?>><? echo $register_data['nome']?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <br><br>
                    <label for="produto">Selecione os produtos:</label>
                    <select name="produto[]" id="produto" class="input-data" multiple required>
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultProduto))
                            {?>
                                <option value='<?php echo $register_data['id']?>'>
                                <?php echo $register_data['nome']?></option>
                            <?php 
                            }
                        ?>
                    </select>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Enviar" title="Enviar">
                </form>
            </div>
    </div>
</body>
</html>
