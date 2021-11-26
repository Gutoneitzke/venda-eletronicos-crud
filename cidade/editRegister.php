<?php
    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cidade WHERE id=$id";

        $sqlEstados = "SELECT * FROM estado";

        $resultEstado = $conexao->query($sqlEstados);
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $estado_id = $user_data['estado_id'];
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
        input[type="text"]{
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
    <a class="backHome" href="cidade.php" title="Voltar">Voltar</a>
    <br><br>
    <div class="box-all">
            <div class="box-title">
                <h1>Venda de eletrônicos</h1>
                <h2>Editar registro - Cidades</h2>
                <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
            </div>
            <div class="box-form">
                <form action="edit.php" method="POST">
                    <label for="nome">Nome da cidade:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" placeholder="Digite um nome para a cidade">
                    <br><br>
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="input-data">
                        <?php
                            while($register_data = mysqli_fetch_assoc($resultEstado))
                            {
                                ?>
                                <option value="<?php echo $register_data['id']?>" <?php echo $register_data['id'] == $estado_id ? 'selected' : '' ?>><?php echo $register_data['nome']?></option>
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
