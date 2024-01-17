<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                    <a href="register.php">Registre-se</a>
                </fieldset>            
            </div>
        </form>

        
    </nav>
    <div class="imagem">
        <center class="empresa">
            <img src="cadeira.jpg" alt="cadeira">
            <h1 >Mesas Araujo</h1>
        </center>
    </div>    
</body>
</html>

<?php
include_once('configClass.php');
if(isset($_POST['edtlogin'])|| isset($_POST['edtkey'])){
    if(strlen($_POST['edtlogin'])==0){
        echo'Favor inserir login';
    }
    else if(strlen($_POST['edtkey'])==0){
        echo'Favor inserir senha';
    }
    else{
        $login = $_POST['edtlogin'];
        $key = $_POST['edtkey'];

        $query = "SELECT LOGIN, SENHA FROM USUARIOS WHERE LOGIN = '$login' AND SENHA = '$key'";

        $instance = new configClass();

        $result = $instance->select($query);

        if($result){
            header('location: principal.php');
        }
        else{
            echo('login ou senha incorretos, favor inserir corretamente.');
            
        }

    }

}

