<?php
require_once('..\helper\configClass.php');
session_start();

$id = $_GET['id'];

$query = "DELETE FROM PEDIDO WHERE ID = $id";

$instance = new configClass();
            
$valInse = $instance->delete($query);

if($valInse){
    header('location: ../view/list.php');
}
else{
    echo "<script> alert('Falha ao excluir o item')</script>";
}