<?php 
require_once('C:\xampp\htdocs\mesas araujo\app\helper\configClass.php');
class MdConfig{

    private $id; 

    private $contexto; 
    
    private $resp;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getContexto(){
        return $this->contexto;
    }

    public function setcontexto($contexto){
        $this->contexto = $contexto;
    }

    public function getResp(){
        return $this->resp;
    }

    public function setResp($resp){
        $this->resp = $resp;
    }

    public function selectParam(){

        $query = "SELECT * FROM PARAMETROS_GLOBAIS";

        $config = new configClass();

        $result = mysqli_query($config->connection(), $query);

        return $result;

    }

    public function updateParam($id, $valor){
        $query = "UPDATE PARAMETROS_GLOBAIS SET VALOR = '$valor' WHERE ID = $id";

        $instance = new configClass();

        $valInse = $instance->update($query);
        
        return $valInse;
    }
    
    public function ConfigFilter(){

        $query = "SELECT * FROM PARAMETROS_GLOBAIS WHERE ID = 1 AND VALOR = '1'";
        $config = new configClass();

        $result = mysqli_query($config->connection(), $query);

        return $result->num_rows;
    }
}