<?php
require_once('..\helper\configClass.php');
session_start();

$id = $_GET['id'];

$query = "DELETE FROM CLIENTE WHERE ID = $id";

$instance = new configClass();
            
$valInse = $instance->delete($query);

if($valInse){
    header('location: ../View/clientList.php');
}
else{
    echo "<script> alert('Falha ao excluir o item')</script>";
}