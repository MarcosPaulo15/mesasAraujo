<?php
session_start();
    require_once('C:\xampp\htdocs\mesas araujo\app\helper\config.php');
    $query = "SELECT ID, JOGO, MESA, CADEIRA, DATE_FORMAT(DATA, '%d/%m/%Y') as 'DATA', PULA FROM PEDIDO WHERE DATA = CURRENT_DATE();";
    $result = mysqli_query($con, $query);
    $notes = [];
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../Style/principal.css">
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
            
            <li class="icAdd">
                <a href="../View/newOrder.php">
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
        <table>
            <th>
                <th>Jogo de mesa</th>
                <th>Cadeira</th>
                <th>Mesa</th>
                <th>Pula-Pula</th>
                <th>Data</th>
            </th>

            <?php
                while($note = mysqli_fetch_array($result)){
                    $notes["id"] = $note['ID'];
                    $notes["jogo"] = $note['JOGO'];                   
                    $notes["cadeira"] = $note['CADEIRA'];
                    $notes["mesa"] = $note['MESA'];
                    $notes["pula"] = $note['PULA'];
                    $notes["data"] = $note['DATA'];      
            ?>
            <tr>
                <td><?php echo '-'; ?></td>
                <td><?php echo $notes['jogo']; ?></td>                
                <td><?php echo $notes['cadeira']; ?></td>
                <td><?php echo $notes['mesa']; ?></td>
                <td><?php echo $notes['pula']; ?></td>
                <td><?php echo $notes['data']?></td>
                <td><a href="update.php?id=<?php echo $notes['id'];?>" class="btneditar">Editar</a></td>   
                <td><a href="delete.php?id=<?php echo $notes['id'];?>" class="btnexcluir">Excluir</a></td>
            </tr>
            <?php }?>
        </table>
    </main>
</body>
</html>