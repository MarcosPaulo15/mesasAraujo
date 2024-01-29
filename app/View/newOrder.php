<?php
require_once('..\helper\configClass.php');
require_once('..\Model\MdNewOrder.php');
require_once('..\Model\MdClient.php');
$inst = new MdNewOrder();
$teste = new MdClient();

$idClient = $_GET['id'];

$client = [];

$result = $teste->clientSel($idClient);
$note= mysqli_fetch_array($result);
$clientName = isset($note['NOME']) ? $note['NOME'] : "";
$telephone = isset($note['TELEFONE']) ? $note['TELEFONE'] : "";

if(isset($_POST['edtjogo']) || isset($_POST['edtmesa']) || isset($_POST['edtcadeira'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST["btn"])){
            $btn = $_POST["btn"];            
            
            $inst->setJogo(isset($_POST['edtjogo']) ? $_POST['edtjogo'] : 'NULL');
            $inst->setMesa(isset($_POST['edtmesa']) ? $_POST['edtmesa'] : 'NULL');
            $inst->setCadeira(isset($_POST['edtcadeira']) ? $_POST['edtcadeira'] : 'NULL');
            $inst->setPula(isset($_POST['ckbpula']) ? 1 : 0);
            $inst->setData(isset($_POST['edtdata']) ? $_POST['edtdata'] : 'NULL');
            $inst->setCodCliente($idClient);
            $inst->setValor(isset($_POST['edtValor']) ? $_POST['edtValor'] : 0);
            
            switch($btn){
                case "Adicionar":
                    echo $_POST['edtValor'];
                    if(strlen($_POST['edtjogo']) == 0 &&
                    strlen($_POST['edtmesa']) == 0 &&
                    strlen($_POST['edtcadeira']) == 0){
                        echo 'todos os campos vazios, favor preencher pelo menos um campo!';
                    }
                    else if(strlen(isset($_POST['edtValor'])) == 0){
                        echo '<script>alert("Favor inserir o valor total do pedido!");</script>';
                    }
                    else{

                        $valInse = $inst->insert();
            
                        if($valInse){
                           header ('location: principal.php');
                        }
                        else{
                            echo 'erro ao inserir';
                        }
                    }
                break;

                case "cancelar" :

                    header ('location: principal.php');
                break;
            }
        }                    
    }    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../Style/stlPrinc.css">
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
        <center>
            <fieldset class="everyEmprise">
                <div class="dvtudo">

                    <h1>Aluguel</h1>
                    
                    <div class="dvCliente">
                        <label for="">Cliente: </label>
                        <input type="text" pattern="[A-Za-z]+" value="<?php echo $clientName?>" readonly>
                    </div>

                    <div>
                        <label for="">Telefone: </label>
                        <input type="text" pattern="[A-Za-z]+" value="<?php echo $telephone?>" readonly>
                    </div>

                    <div class="dvjmesa">
                        <label>Jogo de mesas:</label>
                        <input type="number" name="edtjogo" value="0">
                    </div>

                    <div>
                        <label>Cadeiras:</label>
                        <input type="number" name="edtcadeira" value="0">
                    </div>

                    <div class="dvmesas">
                        <label>Mesas:</label>
                        <input type="number" name="edtmesa" value="0">
                    </div>

                    <div class="dvdate">
                        <label for=""> Data:</label>
                        <input type="date" name="edtdata">
                    </div>

                    <div>
                        <label > Pula - Pula:</label>
                        <input type="checkbox" name="ckbpula">
                    </div>
                </div>
                    
                <div class="valor">
                    <label for="">Valor Total:</label>
                    <input type="number" class="edtTotal" name="edtValor">
                </div>
            </fieldset>
        </center>          
        
                <div class="dvbtn">
                    <center>
                        <input type="submit" value="Adicionar" class="btnadd" name="btn">
                        <input type="submit" value="cancelar" class="btncancel" name="btn">
                    </center>
                </div>           
            </div>
    </form>
</body>
</html>

