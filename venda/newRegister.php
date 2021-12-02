<?php

    include_once('../config.php');

    $sqlSelectVendedor  = "SELECT *  FROM vendedor";
    $sqlSelectProduto   = "SELECT *  FROM produto";
    $sqlSelectCliente   = "SELECT *  FROM cliente";

    $resultVendedor  = $conexao->query($sqlSelectVendedor);
    $resultProduto   = $conexao->query($sqlSelectProduto);
    $resultCliente   = $conexao->query($sqlSelectCliente);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo registro | UPF</title>
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
                <h2>Novo registro - Vendas</h2>
                <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
            </div>
            <div class="box-form">
                <form action="insert.php" method="POST">
                    <label for="data">Data:</label>
                    <input type="date" class="input-data" name="data" id="data" required>
                    <br><br>
                    <label for="vendedor">Selecione o vendedor:</label>
                    <select name="vendedor" id="vendedor" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultVendedor))
                            {
                                echo "<option value=$register_data[id]>$register_data[nome]</option>";
                            }
                        ?>
                    </select>
                    <br><br>
                    <label for="cliente">Selecione o cliente:</label>
                    <select name="cliente" id="cliente" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultCliente))
                            {
                                echo "<option value=$register_data[id]>$register_data[nome]</option>";
                            }
                        ?>
                    </select>
                    <br><br>
                    <label for="produto">Selecione os produtos:</label>
                    <select name="produto[]" id="produto" class="input-data" multiple required>
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultProduto))
                            {
                                echo "<option value=$register_data[id]>$register_data[nome]</option>";
                            }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" name="submit" value="Enviar" title="Enviar">
                </form>
            </div>
    </div>
</body>
</html>