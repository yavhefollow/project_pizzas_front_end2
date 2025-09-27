<?php

$product=$_POST['producto']; //sacacos de los 'name'
$price=$_POST['precio'];
$category=$_POST['categoria'];

include_once("config_products.php");
include_once("db.class.php");
$link = new Db();


include_once("upload.class.php");
$upload = new Upload();

// Ruta completa de la imagen subida al servidor.
$path_img=$upload->uploadImage();

$sql = "INSERT INTO products (id_category, price, product_name, image) values (?,?,?,?)";

$stmt=$link->run($sql,[$category,$price,$product,$path_img]);

?>