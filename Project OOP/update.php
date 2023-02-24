<?php 

    require_once("connection.php");
    include_once 'user_class.php';
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    session_start();
    
    if(isset($_POST['update']))

    {
    $product->update();
    }



?>