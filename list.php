<?php
session_start();
    include_once('config.php');
    include_once('configClass.php');
    $filter = isset($_POST['date']) ? " WHERE DATA >= " . "'" . $_POST['date'] . "'" : " ";
    $query = "SELECT ID, JOGO, MESA, CADEIRA, DATE_FORMAT(DATA, '%d/%m/%Y') as 'DATA', PULA FROM PEDIDO" . $filter . 'ORDER BY DATA ASC';
    $result = mysqli_query($con, $query);
    $notes = [];
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="list.css">
    <title>Principal</title>
</head>
<body>

    <nav class="nvmenu">
        <ul class="ulgeral">
            <li class="icPrinc">
                <a href="principal.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Principal</span>
                </a>                
            </li>

            <li class="icList">
                <a href="list.php">
                    <i class="fas fa-solid fa-list"></i>
                    <span class="nav-item">Lista</span>
                </a>                
            </li>
            
            <li class="icAdd">
                <a href="newOrder.php">
                    <i class=" fas fa-solid fa-plus"></i>
                    <span class="nav-item">Novo aluguel</span>
                </a>                
            </li>
        </ul>
    </nav>

   <main class="cabecalho">
        <form action="" method="POST">
            <div class="dvsearch">
                <label for="">Pesquisar</label>
                <input type="date" name="date">
                <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> buscar
                </button>
            </div>
            
        </form>
        
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
                    $notes["mesa"] = $note['MESA'];
                    $notes["cadeira"] = $note['CADEIRA'];
                    $notes["pula"] = $note['PULA'];
                    $notes["data"] = $note['DATA'];      
            ?>
            <tr>
                <td><?php echo $notes['id']; ?></td>
                <td><?php echo $notes['jogo']; ?></td>
                <td><?php echo $notes['mesa']; ?></td>
                <td><?php echo $notes['cadeira']; ?></td>
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