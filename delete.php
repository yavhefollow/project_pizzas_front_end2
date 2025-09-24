<?php
session_start();

if ($_SESSION['logueado']){

include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
$idDel=$_GET['q'];
//delete from products where id_product=13
$sql="delete from products where id_product=".$idDel;
$stmt=$link->run($sql);
header('location:welcome.php');
}

?>