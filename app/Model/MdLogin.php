<?php 

class MdLogin{

    private $id;

    private $name;

    private $login;
    private $password;



    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($key){
        $this->password = $key;
    }

    public function SelectData(){        

        $valLogin = $this->getLogin();
        $valPass = $this->getPassword();

        $query = "SELECT LOGIN, SENHA FROM USUARIOS WHERE LOGIN = '$valLogin' AND SENHA = '$valPass'";

        $instance = new configClass();

        $result = $instance->select($query);

        return $result;

    }

    public function Register(){

        $valName = $this->getName();
        $valLogin = $this->getLogin();
        $valPass = $this->getPassword();

        $inst = new configClass();        
        $query = "INSERT INTO usuarios VALUES(NULL, '$valName', '$valLogin', '$valPass')";
                    
        $sql_query = $inst->insert($query);
        if($sql_query){
            header('location: ../index.php');
        }
        else{
            echo 'falha ao inserir.';
        }
    }
}