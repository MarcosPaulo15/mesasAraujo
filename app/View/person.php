<?php
require_once('..\helper\configClass.php');
require_once('C:\xampp\htdocs\mesas araujo\app\Model\MdClient.php');
$inst = new MdClient();


if(isset($_POST['edtNumber']) || isset($_POST['edtBairro']) || isset($_POST['edtRua']) || isset($_POST['lblcep'])
|| isset($_POST['edtTel']) || isset($_POST['edtName'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cep = isset($_POST['lblcep']) ? $_POST['lblcep'] : "";
        $nome = $inst->getName();
        $rua = "";
        $bairro = " ";
        $cidade = " ";
        $estado = " ";

        if(isset($_POST["btn"])){
            $btn = $_POST["btn"];             
            
            switch($btn){
                case "Adicionar":
                    if(strlen($_POST['edtName']) == 0){
                        echo 'Campo nome vazio, favor inserir valor!';
                    } 
                    else if(strlen($_POST['edtTel']) == 0){
                        echo 'Campo Telefone vazio, favor inserir valor!';
                    }
                    else if(strlen($_POST['edtRua']) == 0){
                        echo 'Campo Endereço vazio, favor inserir valor!';
                    }
                    else if(strlen($_POST['edtbairro']) == 0){
                        echo 'Campo bairro vazio, favor inserir valor!';
                    }
                    else if(strlen($_POST['edtNumber']) == 0){
                        echo 'Campo numero vazio, favor inserir valor!';
                    }
                    
                    else{

                        $inst->setName(isset($_POST['edtName']) ? $_POST['edtName'] : "");
                        $inst->setTelefone(isset($_POST['edtTel'])? $_POST['edtTel'] : "");
                        $inst->setCep(isset($_POST['lblcep'])? $_POST['lblcep'] : "");
                        $inst->setEnd(isset($_POST['edtRua']) ? $_POST['edtRua'] : "");
                        $inst->setBairro(isset($_POST['edtbairro']) ? $_POST['edtbairro'] : "");
                        $inst->setNumero(isset($_POST['edtNumber']) ? $_POST['edtNumber'] : "");

                        $valInse = $inst->registerClient();
            
                        if($valInse){
                            echo '<script>alert("Cliente inserido com sucesso!");</script>';
                        }
                        else{
                            echo '<script>alert("erro ao inserir!");</script>';
                        }
                    }
                break;

                case "cancelar" :

                    header ('location: principal.php');
                break;

                case "cepi" :
                    
                    $cep = isset($_POST['lblcep']) ? $_POST['lblcep'] : "";
                    $valCep = $inst->consultarCEP($cep);  
                    if($valCep){
                        $rua = isset($valCep['logradouro']) ? $valCep['logradouro'] : " ";
                        $bairro = isset($valCep['bairro']) ? $valCep['bairro'] : " ";
                        $cidade = isset($valCep['localidade']) ? $valCep['localidade'] : " ";
                        $estado = isset($valCep['uf']) ? $valCep['uf'] : " ";
                    }else{
                        echo "Falha ao consultar o CEP";
                    }

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
    <link rel="stylesheet" href="../Style/person.css">
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
        <div>
            <center>
                <fieldset>
                    <Label class="tituloPes">Dados Pessoais</Label>

                    <div class="lblname">
                        <input type="text" placeholder="Nome" class="edtName" name="edtName" value="<?php echo isset($_POST['edtName']) ? $_POST['edtName'] : ""; ?>">
                    </div>

                    <div class="lblname">
                        <input type="tel" placeholder="Telefone"  class="edtTel" name="edtTel" value="<?php echo isset($_POST['edtTel']) ? $_POST['edtTel'] : ""?>">
                    </div>

                    <div>
                        <input type="text" placeholder="CEP" name="lblcep" class="lblcep" value="<?php echo isset($cep) ? $cep : "";?>" maxlength="8">
                        <button type="submit" value="cepi" name="btn">
                            <i class="fa-solid fa-magnifying-glass" class="btnsearch"></i> 
                        </button>
                    </div>
                    
                    <div>
                        <input type="text" value="<?php echo isset($rua) ? $rua : "";?>" name="edtRua" placeholder="Endereço">
                    </div>
                    <br>
                    <div>
                        <input type="text" value="<?php echo isset($bairro) ? $bairro : "";?>" name="edtbairro" placeholder="Bairro">
                        
                    </div>
                    <br>
                    <div>
                    <input type="tel" placeholder="Numero" class="edtNumber" name="edtNumber">
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

