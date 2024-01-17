<?php
session_start();
require_once ('config.php');
require_once ('configClass.php');
class actionRegister{

    public function Register($name, $login, $key){

        $inst = new configClass();
        
        $query = "INSERT INTO usuarios VALUES(NULL, '$name', '$login', '$key')";
                    $sql_query = $inst->insert($query);
                    if($sql_query){
                        header('location: index.php');
                    }
                    else{
                        echo 'falha ao inserir.';
                    }
    }
}