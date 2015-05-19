<?php


try{
    $conn = new PDO('mysql:host=localhost;dbname=dost','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $name = $_REQUEST['name'];
}
catch(PDOException $e){
    echo $sql . "<br/>" . $e->getMessage();
}