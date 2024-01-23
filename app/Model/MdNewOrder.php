<?php
require_once('C:\xampp\htdocs\mesas araujo\app\helper\configClass.php');
require_once('C:\xampp\htdocs\mesas araujo\app\helper\config.php');
require_once('../Model/MdConfig.php');

class MdNewOrder{
    private $id;

    private $jogo;

    private $cadeira;

    private $mesa;

    private $pula;

    private $data;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getJogo(){
        return $this->jogo;
    }

    public function setJogo($jogo){
        $this->jogo = $jogo;
    }

    public function getCadeira(){
        return $this->cadeira;
    }

    public function setCadeira($cadeira){
        $this->cadeira = $cadeira; 
    }

    public function getMesa(){
        return $this->mesa;
    }

    public function setMesa($mesa){
        $this->mesa = $mesa;
    }

    public function getPula(){
        return $this->pula;
    }

    public function setPula($pula){
        $this->pula = $pula;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }
    
    public function insert(){

        $valJogo = $this->getJogo();
        $valMesa = $this->getMesa();
        $valCadeira = $this->getCadeira();
        $valPula = $this->getPula();
        $valData = $this->getData();

        $query = "INSERT INTO PEDIDO VALUES(NULL, $valJogo, $valMesa, $valCadeira, $valPula, '$valData')";
        $instance = new configClass();

        $valInse = $instance->insert($query);

        return $valInse;
    }

    public function selectInfo($id){
        $query = "SELECT * FROM PEDIDO WHERE ID = $id";
        $ins = new configClass();
        $result = mysqli_query($ins->connection(), $query);
        
        $note = mysqli_fetch_array($result);
        $this->setJogo($note ['JOGO']); 
        $this->setCadeira($note['CADEIRA']);
        $this->setMesa($note['MESA']);
        $this->setPula($note['PULA']);
        $this->setData($note['DATA']);
    }

    public function Update($id){

        $jogo = $this->getJogo();
        $mesa = $this->getMesa();
        $cadeira = $this->getCadeira();
        $pula = $this->getPula();
        $data = $this->getData();

        $query = "UPDATE PEDIDO SET JOGO = $jogo, MESA = $mesa, CADEIRA = $cadeira, PULA = $pula, DATA = '$data' WHERE ID = $id";
                        
        $instance = new configClass();

        $valInse = $instance->update($query);
        
        return $valInse;
    } 
    
    public function list($data){

        $config = new configClass();
        $parametro = new MdConfig();
        $filter = "";
        if($parametro->ConfigFilter() == 0){
            $filter = isset($data) ? " WHERE DATA >= " . "'" . $data . "'" : " ";
        }
        else{
            $filter = isset($data) ? " WHERE DATA = " . "'" . $data . "'" : " ";
        }
        
        $query = "SELECT ID, JOGO, MESA, CADEIRA, DATE_FORMAT(DATA, '%d/%m/%Y') as 'DATA', PULA FROM PEDIDO" . $filter . 'ORDER BY DATA ASC';
        $result = mysqli_query($config->connection(), $query);
        return $result;
    }    
}
