<?php
session_start();
if ($_SESSION['logueado']) {
    include_once("config_products.php");
    include_once("db.class.php");
    $link = new Db();
    $product = $_POST['producto'];
    $price = $_POST['precio'];
    $category = $_POST['categoria'];
    //$img = $_POST['imagen'];

    //consulta
     $sql = "INSERT INTO products (id_category, price, product_name, image) 
     values ($category,$price,$product,$imagen)";


//
    $stmt = $link->run($sql);
    header('Location:welcome.php');
}