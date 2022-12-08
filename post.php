<?php
require("./conexion.php");
$data = json_decode(file_get_contents('php://input'), true); 
$name = $data['Producto'];
$price = $data['Monto'];
$quantity = $data['Descripción'];

$conexion = new Conexion();
$db = $conexion->getConexion();
$query = "INSERT INTO productos (Producto, Monto, Descripción) VALUES (:name,:price,:quantity)";
$statement = $db->prepare($query);
$statement->bindParam(":name", $name);
$statement->bindParam(":price", $price);
$statement->bindParam(":quantity", $quantity);
$result = $statement->execute();
if($result){
   return "successfully";
}
 return "error!";