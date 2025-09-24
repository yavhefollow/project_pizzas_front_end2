<?php
session_start();
if ($_SESSION['logueado']) {
    include_once("config_products.php");
    include_once("db.class.php");
    $link = new Db();
    $id = $_POST['id'];
    $name = $_POST['nombre'];
    $price = $_POST['precio'];
    $category = $_POST['categoria'];
    $fechaIng = $_POST['fecha'];
    $sql = "update products set product_name='$name',price='$price',id_category='$category',start_date='$fechaIng' where id_product=" . $id;

    

    //$sql="update products set product_name='$name',price='$price',category_name='$category' where id_product=".$id;
    $stmt = $link->run($sql);
    header('Location:welcome.php');
}
