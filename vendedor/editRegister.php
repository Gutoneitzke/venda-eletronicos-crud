<?php
    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM vendedor WHERE id=$id";

        $sqlCidade = "SELECT * FROM cidade";

        $resultCidade = $conexao->query($sqlCidade);
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $data_nasc = $user_data['data_nasc'];
                $sexo = $user_data['sexo'];
                $endereco = $user_data['endereco'];
                $cidade_id = $user_data['cidade_id'];
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
    <a class="backHome" href="vendedor.php" title="Voltar">Voltar</a>
    <br><br>
    <div class="box-all">
            <div class="box-title">
                <h1>Venda de eletrônicos</h1>
                <h2>Editar registro - Vendedor</h2>
                <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
            </div>
            <div class="box-form">
                <form action="edit.php" method="POST">
                <label for="nome">Nome do vendedor:</label>
                    <input type="text" class="input-data" name="nome" id="nome" placeholder="Digite um nome para o vendedor" value="<?php echo $nome ?>">
                    <br><br>
                    <label for="email">Email:</label>
                    <input type="text" class="input-data" name="email" id="email" placeholder="Digite um email" value="<?php echo $email ?>">
                    <br><br>
                    <label for="telefone">Telefone:</label>
                    <input type="number" class="input-data" name="telefone" id="telefone" placeholder="Digite um telefone" value="<?php echo $telefone ?>">
                    <br><br>
                    <label for="data_nasc">Data de nascimento:</label>
                    <input type="date" class="input-data" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc ?>">
                    <br><br>
                    <label>Sexo:</label>
                    <br><br>
                    <input type="radio" class="input-data" name="sexo" id="sexo_f" <?php echo $sexo == 'F' ? 'checked' : '' ?> value="F">
                    <label for="sexo_f">Feminino</label>
                    <br><br>
                    <input type="radio" class="input-data" name="sexo" id="sexo_m" <?php echo $sexo == 'M' ? 'checked' : '' ?> value="M">
                    <label for="sexo_m">Masculino</label>
                    <br><br>
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="input-data" name="endereco" id="endereco" value="<?php echo $endereco ?>">
                    <br><br>
                    <label for="cidade">Cidade:</label>
                    <select name="cidade" id="cidade" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultCidade))
                            {
                                ?>
                                <option value="<?php echo $register_data['id']?>" <?php echo $register_data['id'] == $cidade_id ? 'selected' : '' ?>><?php echo $register_data['nome']?></option>
                                <?
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
