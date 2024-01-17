<?php
class configClass{

public $usuario  = "root";
public $password = "";
public $servidor = "localhost";
public $basededatos = "conversa";

public function insert($query){

    $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->basededatos) or die("Falha ao conectar no servidor");
    $result = mysqli_query($con, $query) or die("Falha ao inserir user.");


    return $result;
}

public function select($query){
    $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->basededatos) or die("Falha ao conectar no servidor");
    
    $runQuery = mysqli_query($con, $query) or die("Falha ao inserir user.");

    $result = mysqli_num_rows($runQuery) > 0 ? true : false;
    return $result;
}

public function update($query){
    $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->basededatos) or die("Falha ao conectar no servidor");
    $result = mysqli_query($con, $query) or die("Falha ao inserir user.");

    return $result;
}

public function delete ($query){
    $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->basededatos) or die("Falha ao conectar no servidor");
    $result = mysqli_query($con, $query) or die("Falha ao inserir user.");

    return $result;
}
}