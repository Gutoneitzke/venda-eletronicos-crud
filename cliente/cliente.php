<?php

    include_once('../config.php');
    if(!empty($_GET['search']))
    {

        $data = $_GET['search'];

        $sql = "SELECT cli.id, cli.nome, cli.email, cli.telefone, cli.data_nasc, cli.sexo, cli.endereco, c.nome cidade FROM cliente cli JOIN cidade c ON cli.cidade_id = c.id WHERE cli.nome LIKE '%$data%' or cli.id LIKE '%$data%' or c.nome LIKE '%$data%' ORDER BY cli.id DESC";

    }
    else
    {
        $sql = "SELECT cli.id, cli.nome, cli.email, cli.telefone, cli.data_nasc, cli.sexo, cli.endereco, c.nome cidade FROM cliente cli JOIN cidade c ON cli.cidade_id = c.id ORDER BY cli.id DESC";
    }
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | UPF</title>
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
        .box-first{
            display: flex;
            justify-content: center;
        }
        .box-list{
            text-align: center;
            background-color: rgba(0,0,0,0.5);
            border-radius: 10px;
            padding: 15px;
            width: 70%;
        }
        .table-list{
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        
        .action{
            width: 15%;
        }
        .link-action{
            padding: 10px;
            margin-left: 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: .8s;
            text-decoration: none;
            color: #fff;
        }
        .link-action-new{
            background-color: #1da962;
            text-decoration: none;
            color: #fff;
            padding: 8px;
            border-radius: 50%;
            width: 1.8%;
            font-weight: bold;
            font-size: 20px;
            align-items: center;
            cursor: pointer;
            transition: .8s;
        }
        .link-action-new:hover{
            background-color: #3ce790;
        }
        .edit{
            background-color: dodgerblue;
        }
        .edit:hover{
            background-color: #1986c7;
        }
        .delete{
            background-color: crimson;
        }
        .delete:hover{
            background-color: #bd1837;
        }
        .bi{
            transform: translate(0, 4px);
        }
        .box-search {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: right;
            gap: 2%;
            align-items: center;
        }
        .search{
            border: none;
            padding: 8px;
            border-radius: 8px;
            width: 20%;
            background-color: #303030;
        }
        input[type="search"]{
            background-color: transparent;
            border: none;
            outline: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <a class="backHome" href="../index.html" title="Voltar">Voltar</a>
    <br><br>
    <div class="box-all">
        <div class="box-title">
            <h1>Venda de eletrônicos</h1>
            <h2>CRUD - Clientes</h2>
            <h3>Alunos: Gustavo Neitzke e Gustavo Bedin</h3>
        </div>
        <br><br>
        <div class="box-first">
            <div class="box-list">
                <div class="box-search">
                    <div class="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <input type="search" name="search" placeholder="Digite algo para pesquisar">
                    </div>
                    <a href="newRegister.php" class="link-action-new" title="Novo registro">+</a>
                </div>
                <table class="table-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>TELEFONE</th>
                            <th>DATA DE NASCIMENTO</th>
                            <th>SEXO</th>
                            <th>ENDEREÇO</th>
                            <th>CIDADE</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($register_data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$register_data['id']."</td>";
                                echo "<td>".$register_data['nome']."</td>";
                                echo "<td>".$register_data['email']."</td>";
                                echo "<td>".$register_data['telefone']."</td>";
                                echo "<td>".$register_data['data_nasc']."</td>";
                                echo "<td>".$register_data['sexo']."</td>";
                                echo "<td>".$register_data['endereco']."</td>";
                                echo "<td>".$register_data['cidade']."</td>";
                                echo "<td class='action'>
                                    <a href='editRegister.php?id=$register_data[id]' class='link-action edit' title='Editar'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>
                                    <a class='link-action delete' onclick='confirmDelete($register_data[id])' title='Remover'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                        </svg>
                                    </a>
                                </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    var search = document.querySelector("input[name='search']");
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'cliente.php?search='+search.value;
    }
    function confirmDelete(id)
    {
        let state = confirm('Você tem certeza que deseja deletar o registro com id: ' + id + ' ?');
        
        if(state)
        {
            window.location = 'deleteCliente.php?id='+id;
        }
    }
</script>
</html>