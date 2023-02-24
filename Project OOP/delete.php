<?php 

    require_once("connection.php");
include_once 'user_class.php';

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);


if($product->id = $_GET['Del'])
{
    $product->delete();
    header("location:adminpage.php");
}
else 
{
    echo ' Please Check Your Query ';
}
