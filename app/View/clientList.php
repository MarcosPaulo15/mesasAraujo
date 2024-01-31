<?php
session_start();
    require_once('..\helper\config.php');
    require_once('..\Model\MdClient.php');
    require_once('..\Model\MdClient.php');
    $inst = new MdClient();
    $result =  strlen(isset($_POST['edtSearch']))> 0 ? $inst->filterClient($_POST['edtSearch']) : $inst->selectAllCliente();
    $notes = [];

    if(isset($_POST['btn'])){
        $btn = $_POST['btn'];

        switch($btn){
        }
    }
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../Style/clientList.css">
    <title>Principal</title>
</head>
<body>

<nav class="nvmenu">
        <ul class="ulgeral">
            <li class="icPrinc">
                <a href="../View/principal.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Principal</span>
                </a>                
            </li>

            <li class="icList">
                <a href="../View/list.php">
                    <i class="fas fa-solid fa-list"></i>
                    <span class="nav-item">Lista</span>
                </a>                
            </li>

            <li class="icPerson">
                <a href="../View/person.php">
                <i class="fas fa-solid fa-id-card"></i>
                    <span class="nav-item">Novo Cliente</span>
                </a>                
            </li>
            
            <li class="icOrder">
                <a href="../View/clientList.php">
                    <i class=" fas fa-solid fa-plus"></i>
                    <span class="nav-item">Novo aluguel</span>
                </a>                
            </li>            

            <li class="icConfig">
                <a href="../View/config.php">
                    <i class="fas fa-solid fa-gear"></i>
                    <span class="nav-item">Configuração</span>
                </a>                
            </li>

            <li class="icout">
                <a href="../index.php">
                    <i class="fas fa-solid fa-door-open"></i>
                    <span class="nav-item">Sair</span>
                </a>                
            </li>
        </ul>
    </nav>
    <main class="cabecalho">

    <form action="" method="POST">
        <center>
            <h1>Escolha o cliente</h1>

            <div class="dvSearch">
                <label for="">Pesquisar: </label>
                <input type="text" class="edtSearch" name="edtSearch">
                <button type="submit" class="btnSearch"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
        </center>
        <table>
            <div>
                <th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                </th>
            </div>

            <?php
                        while($note = mysqli_fetch_array($result)){
                            $notes["id"] = $note['ID'];
                            $notes["nome"] = $note['NOME'];                   
                            $notes["telefone"] = $note['TELEFONE'];
                            $notes["cep"] = $note['CEP'];
                            $notes["logradouro"] = $note['LOGRADOURO'];
                            $notes["bairro"] = $note['BAIRRO'];      
                            $notes["numero"] = $note['NUMERO'];
                    ?>
                    <tr>
                        
                <tr>
                    <td><a href="../View/newOrder.php?id=<?php echo $notes['id'];?>" class="btnSelect"><i class="fa-solid fa-check"></i></a></td>
                    <td><?php echo $notes['nome']; ?></td>                
                    <td><?php echo $notes['telefone']; ?></td>
                    <td><?php echo $notes['logradouro']; ?></td>
                    <td><?php echo $notes['bairro']?></td>
                    <td><a href="../View/updateClient.php?id=<?php echo $notes['id'];?>" class="btneditar">Editar</a></td>   
                    <td><a href="../View/deleteCli.php?id=<?php echo $notes['id'];?>" class="btnexcluir">Excluir</a></td>
                </tr>
            <?php }?>
        </table>

    </form>
          
    </main>
    
</body>
</html>