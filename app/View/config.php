<?php

include_once('../Model/MdConfig.php');
$inst = new MdConfig();
$result = $inst->selectParam();

$note = [];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="../Style/config.css">
        <title>Document</title>
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
                    <span class="nav-item">Cliente</span>
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
        <form action="" method="POST">
            <table>
                <th>
                    <th>Paramêtro</th>
                    <th>Contexto</th>
                    <th>Resposta</th>
                </th>

                <?php
                    while($note = mysqli_fetch_array($result)){
                        $notes['id'] = $note['ID'];
                        $notes["param"] = $note['NOME'];
                        $notes["contex"] = $note['CONTEXTO'];
                        $notes["check"] = $note['CHECKABLE'];   
                        $notes['valor'] = $note['VALOR'];
                    }
                ?>
                <tr>
                    <td><?php echo '-'; ?></td>
                    <td><?php echo $notes['param']; ?></td>
                    <td><?php echo $notes['contex']; ?></td>
                    <td>
                        <?php 
                            if ($notes['check'] == 1){
                        ?>  <input type="checkbox"  name="check" <?php if($notes['valor']) { ?> checked <?php }?>>
                        <?php   
                        } else { ?>
                            <input type="text">
                        <?php
                        } 
                        ?>
                    </td>
                </tr>
            </table> 
            <div class="btn">
                <input type="submit" value="CONFIRMA" name="btn" class="confirm">
                <input type="submit" value="CANCELA" name="btn" class="cancel">
            </div>            
        </form>            
    </body>
</html>

<?php
    if(isset($_POST["btn"])){
        $btn = $_POST["btn"];

        switch($btn){
            case "CONFIRMA" : 
                $check = isset($_POST['check']) ? 1 : 0;
                $inst = new MdConfig();

                if($inst->updateParam($notes['id'], $check)){

                    header('location: principal.php');
                }
                else{
                    echo "<script type='javascript'>alert('falha ao atualizar o item!')</script>";
                }
            
            break;

            case "CANCELA" : 
                header('location: principal.php');
            break;
        }
    }

