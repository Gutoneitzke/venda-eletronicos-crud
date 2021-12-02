<?php

    include_once('../config.php');

    $sqlSelectVendedor = "SELECT *  FROM vendedor";
    $sqlSelectCategoria = "SELECT *  FROM categoria";

    $resultVendedor = $conexao->query($sqlSelectVendedor);
    $resultCategoria = $conexao->query($sqlSelectCategoria);

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
    <a class="backHome" href="produto.php" title="Voltar">Voltar</a>
    <br><br>
    <div class="box-all">
            <div class="box-title">
                <h1>Venda de eletrônicos</h1>
                <h2>Novo registro - Produtos</h2>
                <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
            </div>
            <div class="box-form">
                <form action="insert.php" method="POST">
                    <label for="nome">Nome do produto:</label>
                    <input type="text" class="input-data" name="nome" id="nome" placeholder="Digite um nome para o produto">
                    <br><br>
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="input-data" name="descricao" id="descricao" placeholder="Digite uma descricao">
                    <br><br>
                    <label for="valor">Valor:</label>
                    <input type="number" class="input-data" name="valor" id="valor" placeholder="Digite um valor">
                    <br><br>
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="input-data" name="quantidade" id="quantidade" placeholder="Digite uma quantidade">
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
                    <label for="categoria">Selecione a categoria:</label>
                    <select name="categoria" id="categoria" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultCategoria))
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