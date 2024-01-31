<?php
    require_once('../Model/MdNewOrder.php');

    $id = $_GET['id'];
    $inst = new MdNewOrder();
    $result = $inst->completeOrder($id);
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $note = mysqli_fetch_array($result);
    $jogo = $note['JOGO'];
    $cadeira = $note['CADEIRA'];
    $mesa = $note['MESA'];
    $pula = $note['PULA'];
    $data = $note['DATA'];
    $valor = $note['VALOR'];
    $nome = $note['NOME'];
    $telefone = $note['TELEFONE'];
    $cep = $note['CEP'];
    $rua = $note['LOGRADOURO'];
    $bairro = $note['BAIRRO'];
    $num = $note['NUMERO'];

    if(isset($_POST['btn'])){
        $btn = $_POST["btn"];
    
        switch($btn){
            case "voltar":
                header('location: ../View/list.php');
            break;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../Style/viewOrder.css">
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
        <center>
            <fieldset class="divEl">
                <center>
                    <label for="">Cliente</label>
                </center>
                <div class="divEl">
                    <div class="name">
                        <label for="">Nome: <?php echo $nome;?></label>
                        <label> </label>
                    </div>

                    <div>
                        <label for="">Telefone:</label>
                        <label for=""> <?php echo $telefone;?></label>
                    </div>
                    <div>
                        <label for="">CEP:</label>
                        <label for=""><?php echo $cep;?></label>
                    </div>
                    <div>
                        <label for="">Rua:</label>
                        <label for=""><?php echo $rua;?></label>
                        <label for="">Num.:</label>
                        <label for=""><?php echo $num;?></label>
                    </div>

                    <div>
                        <label for="">Bairro:</label>
                        <label for=""><?php echo $bairro;?></label>
                        
                    </div>

                    <br>
                    <hr>
                    <br>

                    <center>
                        <div>
                            <label for="">Pedido</label>
                        </div>
                    </center>
                    
                    <?php
                        if($jogo > 0){
                            echo "<div> <label>Jogo de Mesa: $jogo</label> </div>";
                        }

                        if($mesa > 0 ){

                            echo "<div> <label>Mesa: $mesa</label> </div>";
                        }

                        if($cadeira > 0 ){

                            echo "<div> <label>Cadeira: $cadeira</label> </div>";
                        }
                        if($pula > 0 ){

                            echo "<div> <label>Pula-Pula: $pula</label> </div>";
                        }
                        if($data > 0 ){

                            echo "<div> <label>Data: $data</label> </div>";
                        }

                        if($valor > 0 ){

                            echo "<div> <label>Valor total: R$ $valor</label> </div>";
                        }
                    ?>
                </div>
                
                <br>
                <br>
                <form action="" method="POST">
                <button type="submit" class="btnback" value="voltar" name="btn">Voltar</button>
                </form>
            </fieldset>
            
        </center>
    </main>

</body>
</html>

