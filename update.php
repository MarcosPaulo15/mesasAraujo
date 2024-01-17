<?php
include_once ('configClass.php');
include_once('config.php');
$id = $_GET['id'];
$query = "SELECT * FROM PEDIDO WHERE ID = $id";
$result = mysqli_query($con, $query);

$note = mysqli_fetch_array($result);
$jm = $note ['JOGO']; 
$cad = $note['CADEIRA'];
$mes = $note['MESA'];
$pupu = $note['PULA'];
$dt = $note['DATA'];

if(isset($_POST['edtjogo']) || isset($_POST['edtmesa']) || isset($_POST['edtcadeira'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST["btn"])){
            $btn = $_POST["btn"];

            $jogo = isset($_POST['edtjogo']) ? $_POST['edtjogo'] : 'NULL';
            $mesa = isset($_POST['edtmesa']) ? $_POST['edtmesa'] : 'NULL';
            $cadeira = isset($_POST['edtcadeira']) ? $_POST['edtcadeira'] : 'NULL';
            $data = isset($_POST['edtdata']) ? $_POST['edtdata'] : 'NULL';
            $pula = isset($_POST['ckbpula']) ? 1 : 0;
           
           
            switch($btn){
                case "Adicionar":
                    if(strlen($_POST['edtjogo']) == 0 &&
                    strlen($_POST['edtmesa']) == 0 &&
                    strlen($_POST['edtcadeira']) == 0){
                        echo 'todos os campos vazios, favor preencher pelo menos um campo!';
                    }
                    else{

                        $query = "UPDATE PEDIDO SET JOGO = $jogo, MESA = $mesa, CADEIRA = $cadeira, PULA = $pula, DATA = '$data' WHERE ID = $id";
                        //echo $query;
                        
                        $instance = new configClass();
            
                        $valInse = $instance->update($query);
            
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
    <link rel="stylesheet" href="stlPrinc.css">
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
                <a href="#">
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

    <form action="" method="POST">
        <fieldset>
            <center>
                <div class="dvtudo">

                    <h1>Titulo</h1>

                    <div class="dvjmesa">
                        <label>Jogo de mesas:</label>
                        <input type="number" name="edtjogo" value="<?php echo $jm; ?>">
                    </div>

                    <div>
                        <label>Cadeiras:</label>
                        <input type="number" name="edtcadeira" value="<?php echo $cad; ?>">
                    </div>

                    <div class="dvmesas">
                        <label>Mesas:</label>
                        <input type="number" name="edtmesa" value="<?php echo $mes; ?>">
                    </div>

                    <div class="dvdate">
                        <label for=""> Data:</label>
                        <input type="date" name="edtdata" value="<?php echo $dt; ?>">
                    </div>

                    <div>
                        <label > Pula - Pula:</label>
                        <input type="checkbox" name="ckbpula" <?php echo ($pupu) ? 'checked' : '';?>">
                    </div>

                    <div class="dvbtn">
                        <i class="fa-solid fa-check"></i>
                        <input type="submit" value="Adicionar" class="btnadd" name="btn">
                        <input type="submit" value="cancelar" class="btncancel" name="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
            </center>            
        </fieldset> 
</body>
</html>