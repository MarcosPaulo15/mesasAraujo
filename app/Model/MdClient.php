<?php 
require_once('C:\xampp\htdocs\mesas araujo\app\helper\configClass.php');
class MdClient{

    private $id; 

    private $name; 

    private $telefone;

    private $cep;

    private $endereço;

    private $Bairro;
    
    private $numero;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getTelefone(){
        return $this->telefone; 
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getCep(){
        return $this->cep;
    }
    
    public function setCep($cep){
        $this->cep = $cep; 
    }

    public function getEnd(){
        return $this->endereço;
    }

    public function setEnd($end){
        $this->endereço = $end;
    }

    public function getBairro(){
        return $this->Bairro;
    }

    public function setBairro($bairro){
        $this->Bairro = $bairro;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($num){
        $this->numero = $num;
    }

    function consultarCEP($cep) {
        // URL da API dos Correios
        $url = "http://viacep.com.br/ws/$cep/json/";
    
        // Inicializa a sessão cURL
        $ch = curl_init($url);
    
        // Configura as opções do cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Executa a requisição cURL e obtém os dados
        $response = curl_exec($ch);
    
        // Verifica se houve algum erro na requisição
        if (curl_errno($ch)) {
            echo 'Erro ao realizar a requisição: ' . curl_error($ch);
            return false;
        }
    
        // Fecha a sessão cURL
        curl_close($ch);
    
        // Decodifica os dados JSON recebidos
        $data = json_decode($response, true);
    
        // Retorna os dados ou false em caso de erro
        return $data;
    }

    public function registerClient(){
        $nome = $this->getName();
        $telefone = $this->getTelefone();
        $cep = $this->getCep();
        $end = $this->getEnd();
        $bairro = $this->getBairro();
        $num = $this->getNumero(); 

        $query = "INSERT INTO CLIENTE (ID, NOME, TELEFONE, CEP, LOGRADOURO, BAIRRO, NUMERO) VALUES(NULL, '$nome', '$telefone', $cep, '$end', '$bairro', $num)";
        $instance = new configClass();
        $valInse = $instance->insert($query);

        return $valInse;
    }

    public function selectAllCliente(){
        $config = new configClass();
        $query =  " SELECT * FROM CLIENTE";
        $result = mysqli_query($config->connection(), $query);
        return $result;
    }

    public function clientSel($id){
        $config = new configClass();
        $query = "SELECT * FROM CLIENTE WHERE ID = $id";
        $result = mysqli_query($config->connection(), $query);
        return $result;
    }

    public function selectClientUpd($id){
        $config = new configClass();
        $query = "SELECT NOME, TELEFONE FROM PEDIDO PED INNER JOIN CLIENTE CLI ON (PED.CODIGO_CLIENTE = CLI.ID) WHERE PED.ID = $id; ";
        $result = mysqli_query($config->connection(), $query);
        return $result;
    }

    public function filterClient($filter){

        $config = new configClass();
        $query = "SELECT * FROM CLIENTE 
        WHERE NOME LIKE '%$filter%' 
        OR TELEFONE LIKE '%$filter%' 
        OR LOGRADOURO LIKE '%$filter%' 
        OR BAIRRO LIKE '%$filter%'";

        $result = mysqli_query($config->connection(), $query);
        return $result;
    }

    public function updateClient($id){
        $nome = $this->getName();
        $telefone = $this->getTelefone();
        $cep = $this->getCep();
        $rua = $this->getEnd();
        $bairro = $this->getBairro();
        $num = $this->getNumero();
        $query = "UPDATE CLIENTE SET NOME = '$nome', 
        TELEFONE = '$telefone', 
        CEP = $cep, 
        LOGRADOURO = '$rua', 
        BAIRRO = '$bairro', 
        NUMERO = $num WHERE ID = $id;";

        $instance = new configClass();
        $valInse = $instance->insert($query);

        return $valInse;
    }
}