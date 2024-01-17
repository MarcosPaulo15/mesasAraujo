<?php
include ('config.php');
require_once('actionRegister.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrar</title>
</head>
<body>
        <form action="" method="POST">

            <div class="borda">
                <fieldset class="fds">
                    <h1>Registre - se </h1>

                    <div class="divnome">
                        <label > Nome: </label>
                        <input type="text" name="name">
                    </div>

                    <div class="login">
                        <label > Login: </label>
                        <input type="text" name="login">
                    </div>
                    <div class="senha">
                        <label> Senha:</label>
                        <input type="text" name="key">
                    </div>                

                    <div class="btns">
                        <input type="submit" value="Registrar" class="btn" name="btn">
                        <input type="submit" value="Cancelar" class="btn" name="btn">
                    </div>
                </fieldset>
            </div>
        </form>
    
</body>
</html>

<?php
if(isset($_POST['name']) || isset($_POST['login']) || isset($_POST['key'])){
    
   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["btn"])){
                $btn = $_POST["btn"];
    
                $name = $_POST['name'];
                $login = $_POST['login'];
                $key = $_POST['key'];
    
                switch($btn){
                    case "Registrar" : 
                        if(strlen($_POST['name']) == 0){
       
                            echo ' campo name vazio, favor preencher!';     
                            }
                            else if(strlen($_POST['login']) == 0){
                                echo ' campo login vazio, favor preencher!';     
                            }
                            else if (strlen($_POST['key']) == 0){
                                echo ' campo login vazio, favor preencher!';  
                            }
                            else{
                                $teste = new actionRegister();
                                $teste->Register($name, $login, $key);
                            }
                    break;
                    case "Cancelar" : 
                        header('location: index.php');
                }
            }
        }    
        
    }

