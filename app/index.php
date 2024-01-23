<?php
require_once('C:\xampp\htdocs\mesas araujo\app\helper\configClass.php');
require_once('C:\xampp\htdocs\mesas araujo\app\Model\MdLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/Style/style.css">
    <title>mesas araujo</title>
</head>
<body>
    <nav >
        <div>
            <center>
                <h1>Login</h1>
            </center>
            
        </div>

        <form action="" method="POST">
            <div class="box">
                <fieldset >
                    <div>
                        <label>Login:</label>
                        <input type="text" name="edtlogin">
                    </div>
                    <div class="divKey">
                        <label>Senha:</label>
                        <input type="password" name="edtkey">
                    </div>
                    <input type="submit" value="entrar" class="btnentry">
                    <a href="..\app\View\register.php">Registre-se</a>
                </fieldset>            
            </div>
        </form>

        
    </nav>
    <div class="imagem">
        <center class="empresa">
            <img src="../app/helper/cadeira.jpg" alt="cadeira">
            <h1 >Mesas Araujo</h1>
        </center>
    </div>    
</body>
</html>

<?php
require_once('..\app\helper\configClass.php');
require_once('..\app\Model\MdLogin.php');

if(isset($_POST['edtlogin'])|| isset($_POST['edtkey'])){
    if(strlen($_POST['edtlogin'])==0){
        echo'Favor inserir login';
    }
    else if(strlen($_POST['edtkey'])==0){
        echo'Favor inserir senha';
    }
    else{

        $end = (__DIR__ . '\app\View\register.php');
        $inst = new MdLogin();
        $inst->setLogin($_POST['edtlogin']);
        $inst->setPassword($_POST['edtkey']);

        if($inst->SelectData()){
            header('location: ../app/View/principal.php') ;
        }
        else{
            echo('login ou senha incorretos, favor inserir corretamente.');            
        }
    }
}

